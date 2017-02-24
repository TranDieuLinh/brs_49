<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check())
        {
            if(Auth::user()->role == 1)
            {
                return $next($request);
            }
            else
            {
                return redirect('/home')->with(
                    [
                        'status' => 'danger',
                        'message' => 'Bạn không có quyền truy cập admin'
                    ]
                );
            }
        }
        else
        {
            return redirect('/home')->with(
                [
                    'status' => 'danger',
                    'message' => 'Bạn chưa đăng nhập'
                ]
            );
        }

    }
}
