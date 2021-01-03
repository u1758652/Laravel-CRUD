<!DOCTYPE html>
@extends("layouts.app")
@section("foodshow")
<form method="POST">
    @csrf
    @method("DELETE")
    <div>

        <p>{{$food -> name}}</p>
        <p>{{$food -> description}}</p>
        <a href="/foods/{{$food->id}}/edit" >
            <p>Edit</p>
        </a>
        <button type="submit">Delete</button>

        <p>
            @foreach($food -> tags as $tag)
                <a href="/foods?tag={{$tag -> name}}">{{$tag -> name}}</a>
            @endforeach
        </p>
    </div>
</form>
<div class="card-body">
    <h5>Display Comments</h5>

    @include('foods.partials.replies', ['comments' => $food->comments, 'food_id' => $food->id])

    <hr />
</div>
<div class="card-body">
    <h5>Leave a comment</h5>
    <form method="post" action="{{ route('comment.add') }}">
        @csrf
        <div class="form-group">
            <input type="text" name="comment" class="form-control" />
            <input type="hidden" name="food_id" value="{{ $food->id }}" />
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" value="Add Comment" />
        </div>
    </form>
</div>
@endsection

