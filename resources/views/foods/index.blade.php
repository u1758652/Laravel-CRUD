<!DOCTYPE html>
@extends("layouts.app")
@section("foodindex")
<body>
<h4>All the foods</h4>

    @foreach($foods as $food)
        <div class="flex flex-row py-2">
            <div class="bg-gray-200">
                <a href="/foods/{{$food->id}}">
                    <p class="text-red-600" >{{$food->name}}</p>
                </a>

                <p>{{$food->description}}</p>
            </div>
        </div>


@endforeach
</body>
@endsection
