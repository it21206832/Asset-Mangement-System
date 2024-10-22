<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticatedSessionController extends Controller
{
    public function store(Request $request)
    {
        // Validate login request
        $this->validateLogin($request);

        // Attempt authentication
        if (Auth::attempt($this->credentials($request), $request->filled('remember'))) {
            $request->session()->regenerate();

            // Redirect based on user type
            if (Auth::user()->userType == 'Admin') {
                return redirect()->intended('dashboard');
            } elseif (Auth::user()->userType == 'Branch') {
                return redirect()->intended('branchDashbord');
            }

            return redirect()->intended('/'); // Default redirection
        }

        // Handle login failure
        return back()->withErrors([
            'email' => __('auth.failed'),
        ]);
    }
}
