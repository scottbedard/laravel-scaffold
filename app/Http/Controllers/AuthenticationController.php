<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    /**
     * Authenticate action
     *
     * @param \Illuminate\Http\Request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authenticate(Request $request)// : RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Create action
     *
     * @param \Illuminate\Http\Request
     *
     * @return |Illuminate\Http\RedirectResponse
     */
    public function create(Request $request): RedirectResponse
    {
        $attributes = $request->validate([
            'email' => 'required|email|unique:users',
            'name' => 'required',
            'password_confirmation' => 'required|same:password',
            'password' => 'required|min:6',
        ]);

        $user = User::create($attributes);

        Auth::login($user);

        $request->session()->regenerate();

        return redirect()->route('home');
    }

    /**
     * Login page
     * 
     * @return \Illuminate\Contracts\View\View
     */
    public function login(): View
    {
        return view('login');
    }

    /**
     * Logout action
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        Auth::logout();

        return redirect()->route('login');
    }

    /**
     * Register page
     * 
     * @return \Illuminate\Contracts\View\View
     */
    public function register(): View
    {
        return view('register');
    }
}
