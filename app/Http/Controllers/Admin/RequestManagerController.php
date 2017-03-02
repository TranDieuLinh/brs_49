<?php
/**
 * Created by PhpStorm.
 * User: VS9 X64Bit
 * Date: 02/03/2017
 * Time: 2:59 PM
 */

namespace App\Http\Controllers\Admin;

use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;

class RequestManagerController extends Controller
{

    public function show($id)
    {
        $request = \App\Models\Request::find($id);
        return view('admin.request-detail')->with([
            'request' => $request,
        ]);
    }

    public function destroy($id)
    {
        \App\Models\Request::destroy($id);
    }

    public function cancelRequest(Request $request)
    {
            if ($this->updateCancelRequest($request)) {
                return redirect('/requestManager');
            }
        return view('admin.request-detail');
    }

    private function updateCancelRequest(Request $addRequest)
    {
        $request = \App\Models\Request::find($addRequest->requestid);
        $request->status = 2;
        return $request->save();
    }
}