<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use Auth;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/user/';

    /**
    * Display login page for user..
    *
    * @return \Illuminate\Http\Response
    */
    public function showLoginForm()
    {
        return view('frontend.login');
    }

    /**
     * Log the user out of the application.
     *
     * @param \Illuminate\Http\Request $request Request
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        return $this->loggedOut($request) ?: redirect()->route('home');
    }
}
