<?php
/**
 * Created by PhpStorm.
 * User: VS9 X64Bit
 * Date: 19/02/2017
 * Time: 11:31 PM
 */

namespace App\Http\Controllers;


use App\Http\Requests\VoteRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Rate;
use App\Models\Review;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{

    public function show($id)
    {
        $book = Book::find($id);
        $category = Category::find($book->category_id);
        $author = Author::find($book->author_id);
        $reviews = $book->reviews()->with(['comments', 'user'])->get();
        if($book->rate_count >0)
        {
            $score = bcdiv($book->rate, $book->rate_count, 2);
        }else
        {
            $score = 0;
        }
        $value = 0;
        if( !Auth::guest() )
        {
            $rate = Rate::findBookRate($book->id, Auth::user()->id)->first();
            if ($rate != null)
            {
                $value = $rate->point;
            }
        }

        return view('homes.book-details')->with([
            'book' => $book,
            'category' => $category,
            'author' => $author,
            'reviews' => $reviews,
            'score' => $score,
            'value' => $value,
        ]);
    }

    public function deleteComment(Request $request)
    {
        $comment_id = $request->comment_id;
        Comment::destroy($comment_id);
    }

    public function deleteReview(Request $request)
    {
        $review_id = $request->review_id;
        Review::deleteById($review_id);
    }

    public function vote(Request $request)
    {
        $user_id = $request->user_id;
        $book_id = $request->book_id;
        $value = $request->value;
        $rate = Rate::findBookRate($book_id, $user_id)->first();
        $book = Book::find($book_id);
        $flag = true;
        if ($rate != null) {
            DB::beginTransaction();
            try {
                $book->rate =$book->rate - $rate->point + $value;
                $book->save();

                $rate->point = $value;
                $rate->save();

                DB::commit();
            } catch (\Exception $e) {
                dump($e);
                DB::rollBack();
                $flag = false;
            }
        } else {
            DB::beginTransaction();
            try {
                $rate = new Rate();
                $rate->user_id = $user_id;
                $rate->type_id = $book_id;
                $rate->point = $value;
                $rate->type = 1;
                $rate->save();

                $book->rate_count += 1;
                $book->rate += $value;
                $book->save();

                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                $flag = false;
            }
        }
        if($book->rate_count >0)
        {
            $score = bcdiv($book->rate, $book->rate_count, 2);
        }else
        {
            $score = 0;
        }

        return response()
            ->json([
                'success' => $flag,
                'score' => $score
            ]);
    }

    public function comment(Request $request)
    {
        $comment = new Comment();
        $comment->user_id = Auth::user()->id;
        $comment->review_id = $request->review_id;
        $comment->content = $request->review_content;
        $comment->save();

        return response()
            ->json([
                'comment' => $comment,
                'user' => $comment->user()->get()->first()
            ]);
    }

    public function review(Request $request)
    {
        $review = new Review();
        $review->user_id = Auth::user()->id;
        $review->book_id = $request->book_id;
        $review->content = $request->review_content;
        $review->save();

        return response()
            ->json([
                'review' => $review,
                'user' => $review->user()->get()->first()
            ]);
    }

    public function editReview(Request $request)
{
    $review = Review::find($request->review_id);
    if ($review) {
        $review->content = $request->review_content;
        $review->save();
    }
}

    public function editComment(Request $request)
    {
        $comment = Review::find($request->comment_id);
        if ($comment) {
            $comment->content = $request->comment_content;
            $comment->save();
        }
    }
}
