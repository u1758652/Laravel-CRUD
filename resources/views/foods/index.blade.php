<!DOCTYPE html>
@extends("layouts.app")
@section("foodindex")
<body>
<form action="/foods/search" method="GET">
    @csrf
    <input type="text" name="search" />
    <input type="submit" class="btn btn-sm btn-primary"/>
</form>
<a href="foods/create"><button>Create some food</button></a>
<h4>All the foods</h4>
    @foreach($foods as $food)
        <div class="flex flex-row py-2">
            <div class="bg-gray-200">
                <a href="/foods/{{$food->id}}">
                    <p class="text-red-600" >{{$food->name}}</p>
                </a>

                <p>{{$food->description}}</p>

                <p>Added by {{$food->user->name}}</p>
            </div>
        </div>
        <div>
            <form method="post" action="/foods/{{$food->id}}/like">
                @csrf
                <div style="height: 10px;" class="flex items-center"  >
                    <button type="submit">
                        <svg  viewBox="7 0 24 24" stroke="currentColor" class="w-7">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="1"
                                  d="M8 7l4-4m0 0l4 4m-4-4v18" />
                        </svg>
                    </button>
                    <span class="text-xs" >{{$food->likes()->where('liked',true)->count()}}</span>
                </div>
            </form>
            <form method="post" action="/foods/{{$food->id}}/like">
                @csrf
                @method("DELETE")
                <div style="height: 10px;" class="flex items-center"  >
                    <button type="submit">
                        <svg  viewBox="7 0 24 24" stroke="currentColor" class="w-7" style="transform: scaleY(-1)">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="1"
                                  d="M8 7l4-4m0 0l4 4m-4-4v18" />
                        </svg>
                    </button>
                    <span class="text-xs">{{$food->likes()->where('liked',false)->count()}}</span>
                </div>
            </form>

        </div>
@endforeach
</body>
@endsection
