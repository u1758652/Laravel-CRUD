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
@endsection
