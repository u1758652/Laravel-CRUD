<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Foods extends Model
{
    use HasFactory;
    use Likable;

    protected $fillable  = ["user_id", "name", "description"];

    public function user(){
        return $this->belongsTo(User::class, "user_id");
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
    public function scopeWithLikes(Builder $query){
        $query->leftJoinSub(
            "select foods_id, sum(liked) likes, sum(!liked) dislikes from likes group by foods_id",
            "likes",
            "likes.foods_id",
            "foods_id"
        );
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }

}
