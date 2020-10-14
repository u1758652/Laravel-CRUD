<!DOCTYPE html>
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
    </div>
</form>

