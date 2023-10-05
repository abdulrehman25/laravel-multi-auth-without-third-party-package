<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/dashboard';
    protected $guard;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm($userType)
    {
        // Customize login form based on $userType
        switch ($userType) {
            case 'admin':
                return view('auth.admin-login', compact('userType'));
            case 'teacher':
                return view('auth.teacher-login', compact('userType'));
            case 'student':
                return view('auth.student-login', compact('userType'));
            default:
                abort(404);
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        //authenticate user based on the user guard from route params
        if (Auth::guard(request('userType'))->attempt($credentials, $request->remember)) {
            return redirect()->intended("/" . request('userType') . $this->redirectTo);
        }
        return back()->withInput($request->only('email', 'remember'));
    }
}
