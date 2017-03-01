<?php
/**
 * Created by PhpStorm.
 * User: VS9 X64Bit
 * Date: 02/03/2017
 * Time: 1:19 AM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function show($id)
    {
        $requests = Request::find($id);
        return view('user.add-request')->with([
            'requests' => $requests,
            ]);
    }

    public function deleteRequest(Request $request)
    {
        $request_id = $request->request_id;
        \App\Models\Request::destroy($request_id);
    }
}