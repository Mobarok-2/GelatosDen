<?php

namespace App\Http\Controllers\Food;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\Food\Food;
class FoodController extends Controller
{
    



    public function foodDetails($id) {

        $foodItem = Food::find($id);

        return view('foods.food-details', compact('foodItem'));


    }


    // public function index()
    // {
    //     return view('food.index');
    // }

    // public function create()
    // {
    //     return view('food.create');
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'price' => 'required',
    //         'category' => 'required',
    //         'description' => 'required',
    //         'image' => 'required',
    //     ]);

    //     $food = new Food();
    //     $food->name = $request->name;
    //     $food->price = $request->price;
    //     $food->category = $request->category;
    //     $food->description = $request->description;
    //     $food->image = $request->image;
    //     $food->save();

    //     return redirect()->route('food.index')
    //         ->with('success', 'Food created successfully.');
    // }

    // public function show(Food $food)
    // {
    //     return view('food.show', compact('food'));
    // }

    // public function edit(Food $food)
    // {
    //     return view('food.edit', compact('food'));
    // }

    // public function update(Request $request, Food $food)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'price' => 'required',
    //         'category' => 'required',
    //         'description' => 'required',
    //         'image' => 'required',
    //     ]);

    //     $food->update($request->all());

    //     return redirect()->route('food.index')
    //         ->with('success', 'Food updated successfully');
    // }

    // public function destroy(Food $food)
    // {
    //     $food->delete();

    //     return redirect()->route('food.index')
    //         ->with('success', 'Food deleted successfully');
    // }
}
