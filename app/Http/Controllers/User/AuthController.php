<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use Auth;
use Socialite;
use App\Services\SocialProviderService;
use App\Http\Requests\RegisterUserRequest;
use App\Services\ActivationService;
use Session;
use URL;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

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
     * Redirect the user to the provider authentication page.
     *
     *@param collection $provider [request login]
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    
     /**
     * Obtain the user information from provider.
     *
     *@param collection $provider [request login]
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        try {
            app(SocialProviderService::class)->createOrGetUser($provider);
            return redirect()->route('user.home');
        } catch (\Exception $ex) {
            session()->flash('warning', $ex->getMessage());
            return redirect()->route('user.login');
        }
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
        return $this->loggedOut($request) ?: redirect()->route('user.home');
    }

    /**
    * Display register page for user..
    *
    * @return \Illuminate\Http\Response
    */
    public function showRegisterForm()
    {
        return view('frontend.register');
    }

    /**
     * Register user of the application.
     *
     * @param \Illuminate\Http\Request $request Request
     *
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterUserRequest $request)
    {
        app(ActivationService::class)->register($request->all());
        return redirect()->route('user.login');
    }

     /**
     * Handle user register and send email
     *
     *@param string $token [identify user]
     *
     * @return register view
     */
    public function activation($token)
    {
        app(ActivationService::class)->activation($token);
        return redirect()->route('user.login');
    }
}
