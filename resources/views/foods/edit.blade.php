<!Doctype html>
@extends("layouts.app")
@section("foodedit")
<div>
    <h1>Edit {{$food->name}}</h1>
    <form method="POST" action="/foods/{{$food->id}}">
        @csrf
        @method("PUT")
        <label class="label" for="name">Name</label>
        <input class="input" type="text" name="name" id="name" value="{{$food->name}}">

        <label class="label" for="description">Description</label>
        <input class="input" type="text" name="description" id="description" value="{{$food->description}}">

        <select name="tags" >
            @foreach($tags as $tag)
                <option value="{{$tag -> id}}">{{$tag -> name}}</option>
            @endforeach
        </select>
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
</div>
@endsection
