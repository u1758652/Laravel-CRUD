<?php

namespace App\Http\Controllers;

use App\Models\Foods;
use Auth;
use Illuminate\Http\Request;

class FoodLikesController extends Controller
{
    public function store(Foods $food){
        $user = Auth::user();
        $food->like($user);

        return back();
    }

    public function destroy(Foods $food){
        $user = Auth::user();
        $food->dislike($user);

        return back();
    }
}
