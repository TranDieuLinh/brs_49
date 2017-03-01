<?php
namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\MarkFavorite;
use App\Models\MarkRead;
use App\Models\Rate;
use App\Models\Review;
use App\Models\User;

class UserController extends Controller {

    public function show($id)
    {
        $user = User::find($id);
        $data = [];
        $comments = Comment::getComments($id, 5)->get();
        $data = array_merge($data, $this->formatData($comments, 'comment'));

        $favorites = MarkFavorite::latestFavorites($id, 5)->get();
        $data = array_merge($data, $this->formatData($favorites, 'favorite'));

        $reviews = Review::latestReview($id, 5)->get();
        $data = array_merge($data, $this->formatData($reviews, 'review'));

        $reads = MarkRead::latestMarkRead($id,5)->get();
        $data = array_merge($data, $this->formatData($reads, 'read'));

        $rates = Rate::latestRate($id,5)->get();
        $data = array_merge($data, $this->formatData($rates, 'rate'));
        $data = $this->sortByDate($data);
        //dump($data);die();

        return view('user.profile')->with([
            'data' => $data,
            'user' => $user,
        ]);
    }

    private function formatData($arrays, $type)
    {
        $data = [];
        foreach ($arrays as $object)
        {
            $item = (Object)[];
            $item->obj = $object;
            $item->type = $type;
            $data[] = $item;
        }
        return $data;
    }

    //Sort by date
    private function sortByDate($my_array)
    {
        do
        {
            $swapped = false;
            for( $i = 0, $c = count( $my_array ) - 1; $i < $c; $i++ )
            {
                if( $my_array[$i]->obj->created_at < $my_array[$i + 1]->obj->created_at )
                {
                    list( $my_array[$i + 1], $my_array[$i] ) =
                        array( $my_array[$i], $my_array[$i + 1] );
                    $swapped = true;
                }
            }
        }
        while( $swapped );
        return $my_array;
    }

    public function request()
    {

        return view('user.request');
    }
}