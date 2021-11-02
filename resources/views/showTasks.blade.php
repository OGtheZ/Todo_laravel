@extends('layout')
@section('content')
@auth()
    <p style="margin-left: 5px">Welcome <strong>{{ auth()->user()->name }}</strong> !</p>
    <form style="margin-left: 5px" action="/logout" method="post">
        @csrf
        <input type="submit" value="Logout">
    </form>
@endauth
<br>
@if (session()->has('success'))
    <p>
        {{ session('success') }}
    </p>
@endif
<form style='margin-left: 5px; margin-bottom: 10px' action="/tasks/create" method="get">
    @csrf

    <input type="submit" value="Create Task">
</form>

    @foreach($tasks as $task)
        @if($task->status === 'completed')
        <ul>
            <li>
                <h4><s>Title: {{ $task->title }}</s></h4>
                <p><s> Description: {{ $task->description }}</s></p>
                <form style="display: inline-block" action="{{route('tasks.edit', $task)}}" method="get">
                    @csrf
                    <input type="submit" value="Edit">
                </form>
                <form style="display: inline-block" action="/tasks/{{$task->id}}/markDone" method="post">
                    @csrf
                    <button type="submit" onclick="confirm('Complete {{$task->title}}?')">Mark as completed</button>
                </form>
                <form style="display: inline-block" action="/tasks/{{$task->id}}/delete" method="post">
                    @csrf
                    <button type="submit" onclick="confirm('Delete {{$task->title}}?')">Delete</button>
                </form>

            </li>
        </ul>
        @else
            <ul>
                <li>
                    <h4>Title: {{ $task->title }}</h4>
                    <p> Description: {{ $task->description }}</p>
                    <form style="display: inline-block" action="{{route('tasks.edit', $task)}}" method="get">
                        @csrf
                        <input type="submit" value="Edit">
                    </form>
                    <form style="display: inline-block" action="/tasks/{{$task->id}}/markDone" method="post">
                        @csrf
                        <button type="submit" onclick="confirm('Complete {{$task->title}}?')">Mark as completed</button>
                    </form>
                    <form style="display: inline-block" action="/tasks/{{$task->id}}/delete" method="post">
                        @csrf
                        <button type="submit" onclick="confirm('Delete {{$task->title}}?')">Delete</button>
                    </form>
                </li>
            </ul>
            @endif
    @endforeach
@endsection
