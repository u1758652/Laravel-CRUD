<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

trait Likable
{
    public function scopeWithLikes(\Illuminate\Database\Eloquent\Builder $query){
        $query->leftJoinSub(
            "select foods_id, sum(liked) likes, sum(!liked) dislikes from likes group by foods_id",
            "likes",
            "likes.foods_id",
            "foods.id"
        );
    }

    public function like($user=null){
        $this->likes()->updateOrCreate(
            [
                "user_id" => $user ? $user->id : auth()->id(),
            ],
            [
                "liked" => true
            ]
        );
    }

    public function dislike($user=null){
        $this->likes()->updateOrCreate(
            [
                "user_id" => $user ? $user->id : auth()->id(),
            ],
            [
                "liked" => false
            ]
        );
    }

    public function isLikedBy(User $user){
        return (bool)$user->likes()
            ->where("foods_id",$this->id)
            ->where("liked", true)
            ->count();
    }

    public function isDislikedBy(User $user){
        return (bool)$user->likes()
            ->where("foods_id",$this->id)
            ->where("liked", false)
            ->count();
    }


    public function likes(){
        return $this->hasMany(Like::class);
    }
}
