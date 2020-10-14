<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Foods;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Foods::latest()->get();

        return view("foods.index",["foods" => $foods]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("foods.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
      $validatedAttr = \request()->validate([
          "name" => ["required", "min:1", "max:60"],
          "description" => ["required", "min:5", "max:500"]
      ]);

      Foods::create($validatedAttr);

      return redirect("/foods");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Foods  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Foods $food)
    {
        return view("foods.show",compact("food"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Foods  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Foods  $food)
    {
        return view("foods.edit",compact("food"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Foods  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Foods $food)
    {
       $validatedAttr = \request()->validate([
            "name" => ["required", "min:1", "max:60"],
            "description" => ["required", "min:5", "max:500"]
        ]);

        $food->update($validatedAttr);

        return redirect("/foods");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Foods  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Foods $food)
    {
        $food->delete();

        return redirect("/foods");
    }
}
