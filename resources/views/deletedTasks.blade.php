@extends('layout')
@section('content')

    @if (session()->has('success'))
        <p style="margin-left: 5px; background-color: #0096FF; width: 200px; border-radius: 8px; text-align: center">
            {{ session('success') }}
        </p>
    @endif
    <form style="margin-left: 5px; display: inline-block" action="/tasks" method="get">
        @csrf
        <button type="submit">Back</button>
    </form>
    <form style="display: inline-block" action="/tasks/clearDeleted" method="post">
        @csrf
        <button class="delete" type="submit" onclick="return confirm('Are you sure?')">Clear deleted</button>
    </form>
    <h3>Deleted tasks:</h3>
    @if(count($tasks) === 0)
        <h6 style="margin-left: 5px">Deleted tasks is empty!</h6>
    @else
        <table>
            <tr>
                <th>Task title</th>
                <th class="desc">Task description</th>
                <th>Deleted at</th>
            </tr>
            @foreach($tasks as $task)
                <tr>
                    <td class="title">
                        {{$task->title}}
                    </td>
                    <td class="desc">
                        {{ $task->description }}
                    </td>
                    <td class="title">
                        {{ $task->deleted_at }}
                    </td>
                    <td>
                        <form style="display: inline-block" action="/tasks/{{$task->id}}/deletePerm" method="post">
                            @csrf
                            <button class="delete" type="submit" onclick="return confirm('Delete {{$task->title}}?')">Remove</button>
                        </form>
                        &nbsp;
                        <form style="display: inline-block" action="/tasks/{{$task->id}}/restore" method="post">
                            @csrf
                            <button type="submit" onclick="return confirm('Restore task?')">Restore</button>
                        </form>
                    </td>
                </tr>

    @endforeach
        {{ $tasks->links() }}
    @endif

@endsection
