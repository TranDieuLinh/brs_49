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
use App\Models\Comment;
use App\Models\Review;
use Auth;

class BookController extends Controller
{

    public function review(){
        if (($content = \Request::get('review')) != null)
        {
            $id = \Request::get('book-id');
            if (($status = \Request::get('status')) == 0)
            {
                $review = new Review();
                $review->user_id = Auth::user()->id;
                $review->book_id = $id;
                $review->content = $content;
                $review->rate = 0;
                $review->rate_count = 0;
                $review->save();
            }else
            {
                $comment = new Comment();
                $comment->user_id = Auth::user()->id;
                $comment->review_id = $status;
                $comment->content = $content;
                $comment->save();
            }
        }

        return redirect()->route('book.show', $id);
    }

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
