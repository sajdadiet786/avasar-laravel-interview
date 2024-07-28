<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $redirectTo = '/admin/home';

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    // Show the application's login form.
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle a login request to the application.
    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        return $this->sendFailedLoginResponse($request);
    }

    // Validate the user login request.
    protected function validateLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
    }

    // Attempt to log the user into the application.
    protected function attemptLogin(Request $request)
    {
        return Auth::attempt(
            $this->credentials($request),
            $request->filled('remember')
        );
    }

    // Get the needed authorization credentials from the request.
    protected function credentials(Request $request)
    {
        return $request->only('email', 'password');
    }

    // Send the response after the user was authenticated.
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        return redirect()->intended($this->redirectPath());
    }

    // Get the post register / login redirect path.
    public function redirectPath()
    {
        return $this->redirectTo;
    }

    // Get the failed login response instance.
    protected function sendFailedLoginResponse(Request $request)
    {
        return redirect()->back()
            ->withInput($request->only('email', 'remember'))
            ->withErrors([
                'email' => __('auth.failed'),
            ]);
    }

    // Log the user out of the application.
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
