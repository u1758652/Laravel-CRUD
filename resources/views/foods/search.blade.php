<!DOCTYPE html>
@extends("layouts.app")
@section("foodsearch")
<a href="foods/create"><button>Create some food</button></a>
<h4>Search Results</h4>
<div>
    @foreach($foods as $food){

    <div>{{$food->name}} </div>

    }
    @endforeach
</div>

@endsection
