<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class HomeController extends Controller
{
    /**
     * Index
     *
     * @return Illuminate\Http\RedirectResponse | \Illuminate\Contracts\View\View
     */
    public function index(): RedirectResponse | View
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        return view('home');
    }
}
