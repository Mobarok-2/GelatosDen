<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Food\Food;
use App\Models\Food\Checkout;
use App\Models\Food\Booking;
use App\Models\Admin\Admin;
use Illuminate\Support\Facades\Hash;

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
    public function createAdmin()
    {
        return view('admins.createAdmin');
    }

    public function storeAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $admins = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($admins) {
            return redirect()->route('admins.all')->with(['success' => 'Admin created successfully']);
        }
    }

    public function allOrders()
    {
        $orders = Checkout::select()->orderBy('id', 'desc')->get();
        return view('admins.allorders', compact('orders'));
    }

    public function editOrder($id)
    {
        $order = Checkout::find($id);
        return view('admins.editorder', compact('order'));
    }
    
    public function updateOrders(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
        ]);
        
        $order = Checkout::find($id);
        $order->update($request->all());

        if($order) {
            return redirect()->route('orders.all')->with(['success' => 'Order updated successfully']);
        }
    }


    public function deleteOrder($id)
    {
        $order = Checkout::find($id);
        $order->delete();

        if($order) {
            return redirect()->route('orders.all')->with(['delete' => 'Order deleted successfully']);
        }
    }

    public function allBookings()
    {
        $bookings = Booking::select()->orderBy('id', 'desc')->get();
        return view('admins.allbookings', compact('bookings'));
    }

   
}
