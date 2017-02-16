<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignupRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function getLogin()
    {
        return view('user.login');
    }

    public function signup(SignupRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->password = $request->password;
        $user->email = $request->email;
        $user->save();
        echo "đăng kí thành công!";
    }

    public function submit_login(Request $request) {
        $authUser = User::findUser($request->email)->first();
        if ($authUser) {
            if($request->password == $authUser->password){
                echo "đăng nhập thành công";
            }else {
                echo "sai tên đăng nhập hoặc mật khẩu";
            }
        }
    }

    public function logout()
    {
        unset($_SESSION['login']);
        $this->load->view('home/index');
    }
}
