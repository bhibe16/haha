<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminHr;

class AdminHrController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!Auth::guard('admin_hr')->attempt($credentials)) {
            return back()->withErrors(['email' => 'Invalid credentials']);
        }

        return redirect()->route('admin.dashboard');
    }
}
