<?php

namespace App\Http\Controllers\Food;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\Food\Food;
Use App\Models\Food\Cart;
Use Auth;
class FoodController extends Controller
{
    



    public function foodDetails($id) {

        $foodItem = Food::find($id);

        //verify if food item exists
        
        $cartVerifing = Cart::where('food_id', $id)
        ->where('user_id', Auth::user()->id)->count();

        return view('foods.food-details', compact('foodItem', 'cartVerifing'));


    } 
       public function cart(Request $request, $id) {

        $cart = Cart::create([
            'user_id' =>  $request->user_id,
            'food_id' => $request->food_id,
            'name' => $request->name,
            'image' => $request->image,
            'price' => $request->price,
        ]);

        if($cart) {
            return redirect()->route('food.details', $id)->with([ 'success' => 'Item added to cart successfully' ]);
        }


    }

}
