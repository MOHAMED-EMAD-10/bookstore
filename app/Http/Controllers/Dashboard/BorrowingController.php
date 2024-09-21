<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Borrowing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BorrowingController extends Controller
{
    public function request()
    {
        $borrowings = Borrowing::with('user', 'book')->where('status', 'pending')->get();
        return view('dashboard.borrowings.index', compact('borrowings'));
    }

    public function index()
    {
        $borrowings = Borrowing::with('user', 'book')->get();
        return view('dashboard.borrowings.index', compact('borrowings'));
    }

    public function reject(Borrowing $borrow)
    {
        // dd($borrow);
        $borrow->update([
            'status' => 'rejected'
        ]);

        $book = $borrow->book;

        $book->update([
            'quantity' => DB::raw('quantity + 1')
        ]);

        flash()->success('The book rejected ');

        return back();
    }

    public function accept(Borrowing $borrow)
    {
        $borrow->update([
            'status' => 'accepted',
        ]);

        flash()->success('The book Accepted');

        return back();
    }
}