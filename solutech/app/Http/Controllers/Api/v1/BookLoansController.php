<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Books\Book_loan;

class BookLoansController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(Book_loan::all());
    }
    public function store(Request $request)
    {
        $book_loan = Book_loan::create($request->all());
        return response()->json([
            'success' => true,
            'message' => 'Book Loan Stored',
            'data' => $book_loan
        ]);

    }
    public function show(Book_loan $book_loan)
    {
        return response()->json($book_loan);
    }
    public function update(Request $request, Book_loan $book_loan)
    {
        $book_loan->update($request->all());
        return response()->json([
            'success' => true,
            'message' => 'Book Loan Updated',
            'data' => $book_loan
        ]);
    }
    public function destroy(Book_loan $book_loan)
    {
        $book_loan->delete();
        return response()->json([
            'success'=> true,
            'message'=> 'Book Loan Deleted',
            'data'=> $book_loan
            ]);
    }
}
