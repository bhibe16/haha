<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; // Import Hash facade
use App\Models\AdminHr; // Ensure this model is imported

class LoginController extends Controller
{
    // Show the login form
    public function login(Request $request)
    {
        // Validate the login request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Attempt to log the user in
        if (Auth::attempt($request->only('email', 'password'))) {
            // If successful, redirect to welcome page
            return redirect()->intended('dashboard'); // Change 'dashboard' to 'welcome'
        }
    
        // If unsuccessful, redirect back with an error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    

    // Log the user out
    public function logout()
    {
        Auth::logout();
        return redirect('admin/login'); // Redirect to login page
    }
}
