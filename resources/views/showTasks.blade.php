@extends('layout')
@section('content')

    @if (session()->has('success'))
        <p style="margin-left: 5px">
            {{ session('success') }}
        </p>
    @endif
    <form style='margin-left: 5px; margin-bottom: 10px; display: inline-block' action="/tasks/create" method="get">
        @csrf

        <button type="submit">Create Task</button>
    </form>
    <form style="display: inline-block" action="/tasks/deleted" method="get">
        @csrf
        <button type="submit">Deleted ({{$deletedTasks}})</button>
    </form>
    <form style="display: inline-block" action="/tasks/clearDeleted" method="post">
        @csrf
        <button  type="submit" onclick="return confirm('Are you sure?')">Clear deleted</button>
    </form>
    <h3 style="margin-left: 5px">Your tasks:</h3>
    @if(count($tasks) === 0)
        <h4 style="margin-left: 5px">No new tasks!</h4>
    @else
    <table>
        <tr>
            <th>Task title</th>
            <th>Task description</th>
            <th>Completed at</th>
        </tr>
        @foreach($tasks as $task)
            @if($task->completed_at != null)
                <tr>
                    <td class="title"><s>{{$task->title}}</s></td>
                    <td class="desc"><s>{{$task->description}}</s></td>
                    <td class="title" style="width: 300px">
                        {{ $task->completed_at }}
                    </td>
                    <td>
                        <form style="display: inline-block" action="/tasks/{{$task->id}}/markDone" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <input type="checkbox" name="toggleComplete" id="checkbox" onchange="this.form.submit()"
                                   checked="checked">
                            <label for="checkbox">Mark as completed</label>
                        </form>
                        &nbsp;
                        <form style="display: inline-block" action="{{route('tasks.edit', $task)}}" method="get">
                            @csrf
                            <button type="submit">Edit</button>
                        </form>
                        &nbsp;
                        <form style="display: inline-block" action="/tasks/{{$task->id}}/delete" method="post">
                            @csrf
                            <button type="submit" onclick="return confirm('Delete {{$task->title}}?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @else
                <tr>
                    <td class="title">{{$task->title}}</td>
                    <td class="desc">{{$task->description}}</td>
                    <td class="title" style="width: 300px">

                    </td>
                    <td>
                        <form style="display: inline-block;" action="/tasks/{{$task->id}}/markDone" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <input type="checkbox" name="toggleComplete" id="checkbox" onchange="this.form.submit()">
                            <label for="checkbox">Mark as completed</label>
                        </form>
                        &nbsp;
                        <form style="display: inline-block" action="{{route('tasks.edit', $task)}}" method="get">
                            @csrf
                            <button type="submit">Edit</button>
                        </form>
                        &nbsp;
                        <form style="display: inline-block" action="/tasks/{{$task->id}}/delete" method="post">
                            @csrf
                            <button type="submit" onclick="return confirm('Delete {{$task->title}}?')">Delete</button>
                        </form>
                        &nbsp;
                    </td>
                </tr>
            @endif
        @endforeach
    </table>
    @endif
@endsection
