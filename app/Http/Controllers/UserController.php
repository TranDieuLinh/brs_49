<?php
namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\MarkFavorite;
use App\Models\MarkRead;
use App\Models\Rate;
use App\Models\Review;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

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

    public function allRequest()
    {
        $requests = Auth::user()->requestBooks()->get();
        return view('user.request')->with([
            'requests' => $requests,
        ]);
    }

    public function addRequest(Request $request)
    {
        if ($request->isMethod('post')) {
            if ($this->sendRequest($request)) {
                return redirect('/allrequest');
            }
        }
        return view('user.add-request');
    }

    public function editRequest(Request $request)
    {
        if ($request->isMethod('post')) {
            if ($this->updateRequest($request)) {
                return redirect('/allrequest');
            }
        }
        return view('user.add-request');
    }

    private function sendRequest(Request $addRequest)
    {
        $request = new \App\Models\Request();
        $request->user_id = Auth::user()->id;
        $request->book_name = $addRequest->name;
        $request->author_name = $addRequest->author;
        $request->date_published = $addRequest->date_published;
        $request->description = $addRequest->description;
        $request->status = 0;
        return $request->save();
    }

    private function updateRequest(Request $addRequest)
    {
        $request = \App\Models\Request::find($addRequest->requestid);
        $request->user_id = Auth::user()->id;
        $request->book_name = $addRequest->name;
        $request->author_name = $addRequest->author;
        $request->date_published = $addRequest->date_published;
        $request->description = $addRequest->description;
        $request->status = 0;
        return $request->save();
    }
}