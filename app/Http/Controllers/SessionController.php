<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\Authentication;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    use Authentication;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function register()
    {
        return view('auth.register');
    }

    /**
     * User Registration
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function registerPost(Request $request)
    {
        if ($this->registrationValidation($request)) {
            $user = User::create($request->all());
            Auth::login($user);

            return redirect()->route('users');
        }
        return redirect()->back()->with('message' , 'Something went wrong');
    }

    /**
     * View Login Page
    */
    public function loginView()
    {
        return view('auth.login');
    }

    /**
     * Log Admin & Users to the Application
     * @param Request $request
     */
    public function loginCheck(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if ($this->loginValidate($request)) {
            try {
                if (Auth::guard('admin')->attempt($credentials) || Auth::guard('web')->attempt($credentials)) {
                    return redirect()->route('dashboard');
                }
            } catch (\Exception $e) {
                return 'login error';
            }
        } else {
            return 'validation failed'; // Add a return statement for validation failure
        }
    }

}
