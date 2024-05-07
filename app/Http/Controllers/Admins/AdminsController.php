<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Food\Food;
use App\Models\Food\Checkout;
use App\Models\Food\Booking;
use App\Models\Admin\Admin;

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
        //food count
        $foodCount = Food::select()->count();
        $orderCount = Checkout::select()->count();
        $bookingCount = Booking::select()->count();
        $adminCount = Admin::select()->count();

        return view('admins.index', compact('foodCount', 'orderCount', 'bookingCount', 'adminCount'));
    }

    public function allAdmins()
    {
        $admins = Admin::select()->orderBy('id', 'desc')->get();
        return view('admins.alladmins', compact('admins'));
    }    
}
