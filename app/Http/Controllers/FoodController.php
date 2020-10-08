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
      \request()->validate([
          "name" => ["required", "min:1", "max:60"],
          "description" => ["required", "min:5", "max:500"]
      ]);

      $food = new Foods();
      $food->name= \request("name");
      $food->description= \request("description");
      $food->save();

      return redirect("/foods");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $food = Foods::find($id);

        return view("foods.show",["food"=>$food]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $food = Foods::find($id);
        return view("foods.edit",compact("food"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        \request()->validate([
            "name" => ["required", "min:1", "max:60"],
            "description" => ["required", "min:5", "max:500"]
        ]);
        $food = Foods::find($id);
        $food->name= \request("name");
        $food->description= \request("description");
        $food->save();

        return redirect("/foods");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        //
    }
}
