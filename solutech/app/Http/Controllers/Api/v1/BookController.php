<?php

namespace App\Http\Controllers\Api\v1;
use App\Http\Requests\StoreBookRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Books\Book;
use App\Http\Resources\v1\BookResource;


class BookController extends Controller
{
    public function index(Request $request)
    {
         return BookResource::collection(Book::all());

    }
    public function store(StoreBookRequest $request)
    {
        $book = Book::create($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Book Stored',
            'data' => $book
        ]);

    }
    public function show(Book $book)
    {
        // return response()->json($book);
        return new BookResource($book);
    }
    public function update(StoreBookRequest $request, Book $book)
    {
        $book->update($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Book Updated',
            'data' => $book
        ]);
    }
    public function destroy(Book $book)
    {
        $book->delete();
        return response()->json([
            'success'=> true,
            'message'=> 'Book Deleted',
            'data'=> $book
            ]);
    }

}
