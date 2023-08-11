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

    public function loginView()
    {
        return view('');
    }

    public function loginCheck(Request $request)
    {
        return $request->all();
    }
}
