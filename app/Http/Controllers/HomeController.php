<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Food\Food;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $brownieItems = Food::select()->take(4)->where('category', 'brownie')->get();
        
        return view('home', compact('brownieItems'));
    }
}
