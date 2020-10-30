<?php

namespace App\Http\Controllers;

use App\Models\Foods;
use Illuminate\Support\Facades\Auth;

class FoodController extends Controller
{

    public function index()
    {
        $foods = Foods::latest()->get();

        return view("foods.index",compact("foods"));
    }


    public function create()
    {
        return view("foods.create");
    }


    public function store()
    {
      $id = Auth::id();
      $validatedAttr = \request()->validate([
          "name" => ["required", "min:1", "max:60"],
          "description" => ["required", "min:5", "max:500"]
      ]);

      $validatedAttr ["user_id"] = $id;

      Foods::create($validatedAttr);

      return redirect("/foods");
    }


    public function show(Foods $food)
    {
        return view("foods.show",compact("food"));
    }


    public function edit(Foods  $food)
    {
        return view("foods.edit",compact("food"));
    }


    public function update(Foods $food)
    {
       $validatedAttr = \request()->validate([
            "name" => ["required", "min:1", "max:60"],
            "description" => ["required", "min:5", "max:500"]
        ]);

        $food->update($validatedAttr);

        return redirect("/foods");
    }

    public function destroy(Foods $food)
    {
        $food->delete();

        return redirect("/foods");
    }


}
