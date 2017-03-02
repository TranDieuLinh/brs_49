<?php
/**
 * Created by PhpStorm.
 * User: VS9 X64Bit
 * Date: 28/02/2017
 * Time: 5:38 PM
 */
namespace App\Http\Controllers\Admin;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function allUser()
    {
        $users = User::all();
        if(Auth::guest()||(Auth::user()->role == 0))
            return redirect('/home');
        return view('admin.user-manager')->with([
            'users' => $users,
        ]);
    }

    public function allBook()
    {
        $books = Book::all();
        if(Auth::guest()||(Auth::user()->role == 0))
            return redirect('/home');
        return view('admin.book-manager')->with([
            'books' => $books,
        ]);
    }

    public function allRequest()
    {
        $requests = \App\Models\Request::all();
        if(Auth::guest()||(Auth::user()->role == 0))
            return redirect('/home');
        return view('admin.request-manager')->with([
            'requests' => $requests,
        ]);
    }
}
