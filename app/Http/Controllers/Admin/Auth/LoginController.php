<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\JsonResponse;

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
    protected $redirectTo = 'admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }
    
    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function showLoginForm()
    {

        return view('admin.auth.login');
    }
    public function username()
    {
        return 'email';
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        $credentials = $this->credentials($request);
        $user = Auth::guard('admin')->getProvider()->retrieveByCredentials($credentials);

        if(is_null($user)){
            return $this->sendFailedLoginResponse($request, 'not found');
        }

        // if ($user && $user->status == '0') {
        //     return $this->sendFailedLoginResponse($request, 'inactive');
        // }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        return $this->sendFailedLoginResponse($request, 'These credentials do not match our records.');
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    protected function validateLogin(Request $request)
    {
        // dd('404');
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
        
    }

    protected function sendFailedLoginResponse(Request $request, $error)
    {
        $message = $error === 'inactive' ? __('auth.account_inactive') : __('auth.failed');

        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors([
                $this->username() => $message,
            ]);
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/admin/login');
    }
}
