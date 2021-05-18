<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Admin\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\ParentAdmin;
use Illuminate\Support\Facades\Hash;

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
    protected $redirectTo = '/parent/home';
    
    public function showLoginForm()
    {
        return view('parent.auth.login');
    }
    
    protected function guard()
    {
        return \Auth::guard('parent'); //guardを指定
    }
    
    public function username()
    {
        return 'name'; //　ログイン方法をnameに変更
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function showRegister()
    {
        return view('parent.auth.register');
    }
    
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/parent/login');
    }
}
