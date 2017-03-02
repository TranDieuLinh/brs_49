<?php
/**
 * Created by PhpStorm.
 * User: VS9 X64Bit
 * Date: 02/03/2017
 * Time: 11:58 PM
 */

namespace App\Http\Controllers\Admin;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
class RequestApproveController extends Controller
{


    public function show($id)
    {
        $categories = Category::all();
        $request = \App\Models\Request::find($id);
        $request->status = 3;
        $request->save();
        return view('admin.approve-request')->with([
            'request' => $request,
            'categories' => $categories,
        ]);
    }

    public function approveRequest(Request $request)
    {
        $requests = \App\Models\Request::all();
        if ($request->isMethod('post')) {
            if ($this->addRequest($request)) {
                return redirect('/allrequest');
            }
        }
        return view('admin.request-manager')->with([
            'requests' => $requests,
        ]);
    }

    private function addRequest(Request $approveRequest)
    {

            $request = \App\Models\Request::find($approveRequest->requestid);
            if($request!=null){
                $request->status = 1;
                if(count((Author::findByName($approveRequest->author)->get()))== 0){
                    $author = new Author();
                    $author->author_name = $approveRequest->author;
                    $author->save();
                }
                $request->save();
                $book = new Book();
                $book->title = $approveRequest->name;
                $book->category_id = Category::findByName($approveRequest->category)->get()->first()->id;
                $book->author_id = Author::findByName($approveRequest->author)->get()->first()->id;
                $book->number_of_page = $approveRequest->number;
                $book->publisher = $approveRequest->publisher;
                $book->description = $approveRequest->description;
                $book->date_published = $approveRequest->date_published;
                $book->image = $approveRequest->image;
                $book->rate = 0;
                $book->rate_count = 0;
                $book->save();
            }else{
                $approveRequest->session()->flash('status', 'fail');
                $approveRequest->session()->flash('message', 'Đã có thay đổi phía người dùng!');
                return redirect('/request-manager');
            }

    }
}