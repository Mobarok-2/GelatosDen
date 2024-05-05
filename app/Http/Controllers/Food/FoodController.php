<?php

namespace App\Http\Controllers\Food;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\Food\Food;
Use App\Models\Food\Cart;
class FoodController extends Controller
{
    



    public function foodDetails($id) {

        $foodItem = Food::find($id);

        return view('foods.food-details', compact('foodItem'));


    } 
       public function cart(Request $request, $id) {

        $cart = Cart::create([
            'user_id' =>  $request->user_id,
            'food_id' => $request->food_id,
            'name' => $request->name,
            'image' => $request->image,
            'price' => $request->price,
        ]);

        echo "Item added to cart successfully";


    }

}
