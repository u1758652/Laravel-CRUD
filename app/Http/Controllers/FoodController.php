<?php

namespace App\Http\Controllers;

use App\Models\Foods;

class FoodController extends Controller
{

    public function index()
    {
        $foods = Foods::latest()->get();

        return view("foods.index",["foods" => $foods]);
    }


    public function create()
    {
        return view("foods.create");
    }


    public function store()
    {
      $validatedAttr = \request()->validate([
          "name" => ["required", "min:1", "max:60"],
          "description" => ["required", "min:5", "max:500"]
      ]);

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
