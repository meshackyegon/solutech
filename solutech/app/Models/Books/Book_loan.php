<?php

namespace App\Models\Books;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book_loan extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "book_id",
        "loan_date",
        "due_date",
        "return_date",
        "extended",
        "extension_date",
        "penalty_amount",
        "penalty_status",
        "status",
        "added_by",

    ];
    public $timestamps = true;

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
