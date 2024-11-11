<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
{
    // Validate incoming request
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'userType' => ['required', 'string'],
        'BranchCode' => ['required_if:userType,Branch', 'string'], 
    ]);

    // Attempt to create the user
    try {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'userType' => $request->userType,
            'BranchCode' => $request->BranchCode,
        ]);
    } catch (\Exception $e) {
        \Log::error('User creation failed: ' . $e->getMessage());
        return back()->withErrors(['registration' => 'Failed to register user. Please try again.']);
    }

    // Fire the Registered event
    event(new Registered($user));

    // Log in the user
    Auth::login($user);

    // Log the user type for debugging
    $userType = Auth::user()->userType;
    \Log::info('User logged in with type:', [$userType]);

    // Redirect based on user type
    if ($userType == 'Admin') {
        return redirect()->intended('dashboard');
    } elseif ($userType == 'Branch') {
        return redirect()->intended('branchDashbord');
    }

    return redirect()->intended('/'); // Default redirection
}

}
