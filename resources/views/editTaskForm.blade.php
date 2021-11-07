@extends('layout')
@section('content')
    <form style="margin-left: 5px; margin-top: 5px" action="/tasks" method="get">
        @csrf
        <button type="submit">Back</button>
    </form>
<form style="margin-left: 5px" action="/tasks/{{$task->id}}/edit" method="post">
    @csrf

    <label for="title">Title</label>
    <br>
    <input type="text" id="title" value="{{$task->title}}" name="title">
    <br>
    <label for="description">Description</label>
    <br>
    <textarea style="resize: none" name="description" id="description" cols="30" rows="10" >{{$task->description}}</textarea>
    <br>
    <button type="submit">Edit</button>
</form>
@endsection
