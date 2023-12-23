<?php

namespace App\Models\Books;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "publisher",
        "isbn",
        "category",
        "sub_category",
        "description",
        "pages",
        "image",
        "added_by",
    ];
    public $timestamps = true;
}
