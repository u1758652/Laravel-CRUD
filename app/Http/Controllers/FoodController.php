<?php

namespace App\Http\Controllers;

use App\Models\Foods;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class FoodController extends Controller
{

    public function index()
    {
        if (request("tag")) {
            $foods = Tag::where("name", request("tag"))->firstOrFail()->foods;
        } else {
            $foods = Foods::latest()->get();
        }

        return view("foods.index", compact("foods"));
    }


    public function create()
    {
        $tags = Tag::all();
        return view("foods.create",["tags"=>Tag::all()]);
    }

    public function store()
    {
      $id = Auth::id();
      $food = new Foods($this->validateFood());
      $food->user_id = $id;
      $food->save();

      $food->tags()->attach(request("tags"));

      return redirect("/foods");
    }


    public function show(Foods $food)
    {
        return view("foods.show",compact("food"));
    }


    public function edit(Foods  $food)
    {
        $tags = Tag::all();
        return view("foods.edit",compact("food"),["tags"=>Tag::all()]);
    }


    public function update(Foods $food)
    {
       $validatedAttr = \request()->validate([
            "name" => ["required", "min:1", "max:60"],
            "description" => ["required", "min:5", "max:500"]
        ]);

        $food->tags()->attach(request("tags"));
        $food->update($validatedAttr);

        return redirect("/foods");
    }

    public function destroy(Foods $food)
    {
        $food->delete();

        return redirect("/foods");
    }

    protected function validateFood()
    {
        return request()->validate([
            "name" => ["required", "min:1", "max:60"],
            "description" => ["required", "min:5", "max:500"]
        ]);

    }

}
