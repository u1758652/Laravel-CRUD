<!Doctype html>
<div>
    <h1>Add food</h1>
    <form method="POST" action="/foods/">
        @csrf
        <label class="label" for="name">Name</label>
        <input class="input" type="text" name="name" id="name">

        <label class="label" for="description">Description</label>
        <input class="input" type="text" name="description" id="description">

        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
</div>
