<?php

namespace App\Http\Controllers\Food;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\Food\Food;
Use App\Models\Food\Cart;
Use Auth;
Use Session;
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

    public function displayCartItem() {

        if(auth()->user()) {
        // display cart items
        $cartItems = Cart::where('user_id', Auth::user()->id)->get();

        // display total price
        $price = Cart::where('user_id', Auth::user()->id)->sum('price');


        return view('foods.cart', compact('cartItems', 'price'));


        } else {
            abort('404');
        }
    }
     public function deleteCartItem($id) {

        // delete cart items
        $deleteItem = Cart::where('user_id', Auth::user()->id)->where('food_id', $id);

        $deleteItem->delete();

        if($deleteItem) {
            return redirect()->route('food.display.cart')->with([ 'delete' => 'Item removed from cart successfully' ]);
        }


    } 

    public function prepareCheckout(Request $request) {
        
        $value = $request->price;

        $price = Session::put('price', $value);

        $newPrice = Session::get('price');

            if($newPrice > 0) {
                return redirect()->route('foods.checkout', compact('price'));
            }
    } 

    public function checkout() {
       
            return view('foods.checkout');
          
    }
}
