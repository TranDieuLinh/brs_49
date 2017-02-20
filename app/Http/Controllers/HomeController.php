<?php
/**
 * Created by PhpStorm.
 * User: VS9 X64Bit
 * Date: 06/02/2017
 * Time: 9:10 AM
 */

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        if (($keyword = \Request::get('search')) != null)
        {
            $books = Book::search($keyword);
            $title = null;
        } else
        {
            $books = Book::findByCategory(1);
            $title = Category::find(1)->name;
        }
        $categories = Category::all();
        $author = Author::findExcellentAuthor();

        return view('homes.index')->with([
            'books'=>$books,
            'author'=>$author,
            'categories'=>$categories,
            'title'=>$title]);
    }

    public function show($id)
    {
        if ($id < 101 && $id > 0) {
            $books = Book::findByCategory($id);
            $title = Category::find($id)->name;
        } elseif ($id >= 101) {
            $books = Book::findByAuthor($id-100);
            $title = Author::find($id-100)->author_name;
        } else {
            $books = Book::findLatest();
            $title = "Mới nhất";
        }
        $categories = Category::all();
        $author = Author::findExcellentAuthor();
        return view('homes.index')->with([
            'books' => $books,
            'author' => $author,
            'categories' => $categories,
            'title' => $title]);
    }

    public function admin()
    {
        return view('admin.start');
    }

    public function login()
    {
        return view('user.login');
    }
}
