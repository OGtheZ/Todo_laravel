<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index()
    {
        return view('showTasks', ['tasks' => Task::all()->where('user_id', auth()->user()->id)]);
    }

    public function showCreateForm()
    {
        return view('createTaskForm');
    }

    public function create()
    {
        $attributes = \request()->validate([
            'title' => ['required'],
            'description' => ['required'],
        ]);
        Task::create([
            'title' => $attributes['title'],
            'description' => $attributes['description'],
            'user_id' => auth()->user()->id,
        ]);
        return redirect('/tasks')->with('success', 'Task created successfully!');
    }

    public function showEditForm($id)
    {
        return view('editTaskForm', ['task' => Task::find($id)]);
    }

    public function edit($id)
    {
        $attributes = \request()->all();
        $task = Task::find($id);
        $task->title = $attributes['title'];
        $task->description = $attributes['description'];
        $task->save();
        return redirect('/tasks')->with('success', "Task $task->title updated!");
    }

    public function delete($id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect('/tasks')->with('success', "Task deleted!");
    }

    public function markAsCompleted($id)
    {
        $task = Task::find($id);
        $task->status = 'completed';
        $task->save();
        return redirect('/tasks');
    }
}
