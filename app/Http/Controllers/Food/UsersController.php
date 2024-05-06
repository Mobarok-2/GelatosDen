<?php

namespace App\Http\Controllers\Food;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\Food\Booking;
Use App\Models\Food\Checkout;
Use Auth;

class UsersController extends Controller
{
    public function getBookings()
    {
        $allBookings = Booking::where('user_id', Auth::user()->id)->get();

        return view('users.bookings', compact('allBookings'));
    }

    public function getOrders()
    {
        $allOrders = Checkout::where('user_id', Auth::user()->id)->get();

        return view('users.orders', compact('allOrders'));
    }
}
