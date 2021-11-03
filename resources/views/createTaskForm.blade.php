@extends('layout')
@section('content')
<a style="margin-left: 5px" href="/tasks">Back</a>
<form style="margin-left: 5px" action="/tasks/create" method="post">
    @csrf

    <label for="title">Title</label>
    <br>
    <input type="text" id="title" name="title" placeholder="Enter title">
    <br>
    <label for="description">Description</label>
    <br>
    <textarea style="resize: none;" name="description" id="description" cols="30" rows="10"></textarea>
    <br>
    <input type="submit" value="Create task">
</form>
@endsection
