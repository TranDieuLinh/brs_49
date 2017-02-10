<?php
/**
 * Created by PhpStorm.
 * User: VS9 X64Bit
 * Date: 06/02/2017
 * Time: 9:10 AM
 */

namespace App\Http\Controllers;


class HomeController extends Controller
{
    public function index()
    {
        return view('homes.index');
    }

    public function admin()
    {
        return view('admin.start');
    }
}
