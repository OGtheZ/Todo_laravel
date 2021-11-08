@extends('layout')
@section('content')

    @if (session()->has('success'))
        <p style="margin-left: 5px; background-color: #0096FF; width: 200px; border-radius: 8px; text-align: center">
            {{ session('success') }}
        </p>
    @endif
    <form style='margin-left: 5px; margin-bottom: 10px; display: inline-block' action="/tasks/create" method="get">
        @csrf
        <button type="submit">Create Task</button>
    </form>
    <form style="display: inline-block" action="/tasks/deleted" method="get">
        @csrf
        <button class="delete" type="submit">Deleted ({{$deletedTasks}})</button>
    </form>
    <form style="display: inline-block" action="/tasks/clearDeleted" method="post">
        @csrf
        <button class="delete" type="submit" onclick="return confirm('Are you sure?')">Clear deleted</button>
    </form>
    <h3 style="margin-left: 5px">Your tasks:</h3>
    @if(count($tasks) === 0)
        <h4 style="margin-left: 5px">No new tasks!</h4>
    @else
         {{ $tasks->links() }}
    <table>
        <tr>
            <th>Task title</th>
            <th>Task description</th>
            <th>Completed at</th>
        </tr>
        @foreach($tasks as $task)
                <tr>
                    <td class="title">
                        @if($task->completed_at != null)<s> @endif
                            {{$task->title}}
                        @if($task->completed_at != null)</s> @endif
                    </td>
                    <td class="desc">
                        @if($task->completed_at != null)<s> @endif
                            {{$task->description}}
                            @if($task->completed_at != null)</s> @endif
                    </td>
                    <td class="title" style="width: 300px">
                        {{ $task->completed_at }}
                    </td>
                    <td>
                        <form style="display: inline-block" action="/tasks/{{$task->id}}/markDone" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <input type="checkbox" name="toggleComplete" id="checkbox" onchange="this.form.submit()"
                                   @if($task->completed_at) checked @endif>
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
                            <button class="delete" type="submit" onclick="return confirm('Delete {{$task->title}}?')">Delete</button>
                        </form>
                    </td>
                </tr>
        @endforeach
    </table>
    @endif
    <br>

@endsection
