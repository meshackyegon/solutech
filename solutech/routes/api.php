<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\BookController;
use App\Http\Controllers\Api\v1\BookLoansController;
use App\Http\Controllers\Api\v1\UsersController;
use App\Http\Controllers\Api\v1\LoginController;
use App\Http\Controllers\Api\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

    // Route::group(['prefix' => 'v1'], function () {
    //     Route::post('register', [LoginController::class, 'register']);
    //     Route::post('login', [LoginController::class, 'login']);
    //     Route::middleware('auth:sanctum')->group(function () {
    //         Route::apiResource('books', BookController::class);
    //         Route::apiResource('loans', BookLoansController::class, 'index');
    //         Route::apiResource('loans/bookId', BookLoansController::class, 'borrowBook');
    //         Route::apiResource('loans/loanId', BookLoansController::class, 'approveLoan');
    //         Route::apiResource('loans/loanId', BookLoansController::class,'ExtendLoan');
    //         Route::apiResource('loans/loanId', BookLoansController::class,'returnBook');
    //         Route::apiResource('users', UsersController::class);
    //     });


    // });

    Route::group(['prefix' => 'v1'], function () {
        Route::post('register', [LoginController::class, 'register']);
        Route::post('login', [LoginController::class, 'login']);

        Route::middleware('auth:sanctum')->group(function () {
            Route::apiResource('books', BookController::class);

            // Correct usage of apiResource with options array
            // Route::apiResource('loans', BookLoansController::class, ['except' => ['index']]);
            Route::post('loans/{bookId}', [BookLoansController::class, 'borrowBook'])->name('loans.borrowBook');
            Route::put('loans/{loanId}', [BookLoansController::class, 'approveLoan'])->name('loans.approveLoan');
            Route::put('loans/{loanId}/extend', [BookLoansController::class, 'extendLoan'])->name('loans.extendLoan');
            Route::put('loans/{loanId}/return', [BookLoansController::class, 'returnBook'])->name('loans.returnBook');

            Route::apiResource('users', UsersController::class);
        });
    });



