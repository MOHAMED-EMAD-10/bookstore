<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::select('id', 'name', 'slug', 'image')->get();
        return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . '-' . $image->hashName();
            $image->storeAs('categories', $fileName, 'public');
        }

        Category::create([
            'name' => $request->name,
            'image' => $fileName,
        ]);

        flash()->success('The Category Added Successfully');

        return redirect()->route('dashboard.categories.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete('categories/' . $category->image);
            $image = $request->file('image');
            $fileName = time() . '-' . $image->hashName();
            $image->storeAs('categories', $fileName, 'public');
        }

        $category->update([
            'name' => $request->name,
            'image' => $fileName ?? $category->image,
        ]);


        flash()->info('The Category Updated Successfully');

        return redirect()->route('dashboard.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // dd($category);
        Storage::disk('public')->delete('categories/' . $category->image);
        $category->delete();
        flash()->warning('The Category Deleted Successfully');
        return redirect()->route('dashboard.categories.index');
    }
}