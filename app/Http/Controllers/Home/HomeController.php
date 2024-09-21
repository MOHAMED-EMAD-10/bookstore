<?php

namespace App\Http\Controllers\Home;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::limit(6)->get();
        $books = Book::with('category')->paginate(8);
        return view('home.index', compact('categories', 'books'));
    }
}