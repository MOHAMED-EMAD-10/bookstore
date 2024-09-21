<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Book;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateBookRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with('category')->latest()->paginate(10);
        return view('dashboard.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        return view('dashboard.books.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        // dd($request->all());
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . '-' . $image->hashName();
            $image->storeAs('books', $fileName, 'public');
        }

        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'image' => $fileName,
        ]);

        flash()->success('The Book Added Successfully');

        return redirect()->route('dashboard.books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $categories = Category::select('id', 'name')->get();
        return view('dashboard.books.edit', data: compact('categories', 'book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete('books/' . $book->image);
            $image = $request->file('image');
            $fileName = time() . '-' . $image->hashName();
            $image->storeAs('books', $fileName, 'public');
        }

        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'image' => $fileName ?? $book->image,
        ]);


        flash()->info('The Book Updated Successfully');

        return redirect()->route('dashboard.books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        Storage::disk('public')->delete('books/' . $book->image);
        $book->delete();
        flash()->warning('The Book Deleted Successfully');
        return redirect()->route('dashboard.books.index');
    }
}