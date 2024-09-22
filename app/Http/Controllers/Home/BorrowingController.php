<?php

namespace App\Http\Controllers\Home;

use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BorrowingController extends Controller
{
    public function borrow(Book $book)
    {
        Borrowing::create([
            'user_id' => Auth::id(),
            'book_id' => $book->id,
        ]);

        $book->update([
            'quantity' => DB::raw('quantity - 1')
        ]);

        flash()->success('The book borrowed');

        return back();
    }
}