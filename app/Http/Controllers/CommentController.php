<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Foods;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $comment = new Comment;

        $comment->comment = $request->comment;

        $comment->user()->associate($request->user());

        $food = Foods::find($request->food_id);

        $food->comments()->save($comment);

        return back();
    }

    public function replyStore(Request $request)
    {
        $reply = new Comment();

        $reply->comment = $request->get('comment');

        $reply->user()->associate($request->user());

        $reply->parent_id = $request->get('comment_id');

        $food = Foods::find($request->get('food_id'));

        $food->comments()->save($reply);

        return back();

    }
}
