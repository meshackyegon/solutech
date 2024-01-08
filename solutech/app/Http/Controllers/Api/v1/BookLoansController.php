<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Books\Book_loan;

class BookLoansController extends Controller
{
    public function index()
    {
        $bookLoans = Book_loan::all();

        return response()->json($bookLoans, 200);
    }
    public function borrowBook(Request $request, $bookId)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            // Add any additional validation rules as needed
        ]);

        $bookLoan = Book_loan::create([
            'user_id' => $request->user_id,
            'book_id' => $bookId,
            'loan_date' => now(),
            'due_date' => now()->addDays(config('app.default_loan_period_days')),
            'status' => 'pending', // You can set an initial status here
            'added_by' => $request->user_id,
        ]);

        return response()->json($bookLoan, 201);
    }

    /**
     * Approve a book loan.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $loanId
     * @return \Illuminate\Http\Response
     */
    public function approveLoan(Request $request, $loanId)
    {
        $request->validate([
            'approval_status' => 'required|in:approved,rejected',
            // Add any additional validation rules as needed
        ]);

        $bookLoan = Book_loan::findOrFail($loanId);

        // Check if the user has the authority to approve loans (e.g., admin)
        // Add your authorization logic here

        $bookLoan->status = $request->approval_status;
        $bookLoan->save();

        return response()->json($bookLoan, 200);
    }

    /**
     * Extend a book loan.
     *
     * @param  int  $loanId
     * @return \Illuminate\Http\Response
     */
    public function extendLoan($loanId)
    {
        $bookLoan = Book_loan::findOrFail($loanId);

        // Check if the book loan is eligible for extension
        // Add your extension eligibility logic here

        $bookLoan->extended = 'yes';
        $bookLoan->extension_date = now();
        $bookLoan->due_date = Carbon::parse($bookLoan->due_date)->addDays(config('app.extension_period_days'));
        $bookLoan->save();

        return response()->json($bookLoan, 200);
    }

    /**
     * Return a borrowed book.
     *
     * @param  int  $loanId
     * @return \Illuminate\Http\Response
     */
    public function returnBook($loanId)
    {
        $bookLoan = Book_loan::findOrFail($loanId);

        // Add logic to calculate penalty if applicable
        // Add your penalty calculation logic here

        $bookLoan->return_date = now();
        $bookLoan->status = 'returned';
        $bookLoan->save();

        return response()->json($bookLoan, 200);
    }
}
