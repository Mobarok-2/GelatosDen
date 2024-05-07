<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    
    public function viewLogin()
    {
        return view('admins.login');
    }

    public function checkLogin(Request $request) {
        $remember_me = $request->has('remember_me') ? true : false;

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Invalid credentials');
    }

    public function adminIndex()
    {
        return view('admins.index');
    }
}
