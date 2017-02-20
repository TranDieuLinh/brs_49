<?php
/**
 * Created by PhpStorm.
 * User: VS9 X64Bit
 * Date: 19/02/2017
 * Time: 11:31 PM
 */

namespace App\Http\Controllers;


use App\Models\Author;
use App\Models\Book;
use App\Models\Category;

class BookController extends Controller
{
    public function show($id)
    {
        $book = Book::find($id);
        $category = Category::find($book->category_id);
        $author = Author::find($book->author_id);
        $reviews = $book->reviews()->with(['comments', 'user'])->get();

        return view('homes.book-details')->with([
            'book' => $book,
            'category' => $category,
            'author' => $author,
            'reviews' => $reviews
        ]);
    }
}
