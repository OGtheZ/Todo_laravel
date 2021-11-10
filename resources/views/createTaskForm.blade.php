@extends('layout')
@section('content')
    <form style="margin-left: 5px; margin-top: 5px" action="/tasks" method="get">
        @csrf
        <button type="submit">Back</button>
    </form>
    @error('title')
    <p style="color: red" style="font-size: x-small">{{ $message }}</p>
    @enderror

<form style="margin-left: 5px" action="/tasks/create" method="post">
    @csrf

    <label for="title">Title</label>
    <br>
    <input type="text" id="title" name="title" placeholder="Enter title">
    <br>
    @error('description')
    <p style="color: red" style="font-size: x-small">{{ $message }}</p>
    @enderror
    <label for="description">Description</label>
    <br>
    <textarea style="resize: none;" name="description" id="description" cols="30" rows="10"></textarea>
    <br>
    <button type="submit">Create task</button>
</form>
@endsection
