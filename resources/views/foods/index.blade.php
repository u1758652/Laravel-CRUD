<!DOCTYPE html>
<body>
<p>Bebe</p>
@foreach($foods as $food)
<div class="content">
    <div class="title">
        <a href="/foods/{{$food->id}}" >
            <p>{{$food->name}}</p>
        </a>

        <p>{{$food->description}}</p>
    </div>

</div>
@endforeach
</body>
