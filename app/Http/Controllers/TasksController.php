<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index()
    {
        return view('showTasks', ['tasks' => Task::all()->where('user_id', auth()->user()->id)->sortByDesc('created_at'),
            'deletedTasks' => Task::onlyTrashed()->get()->count()]);
    }

    public function showCreateForm()
    {
        return view('createTaskForm');
    }

    public function create()
    {
        $attributes = \request()->validate([
            'title' => ['required', 'max:255', 'min:1'],
            'description' => ['required', 'max:255'],
        ]);
        $task = new Task([
            'title' => $attributes['title'],
            'description' => $attributes['description'],
        ]);
            $task->user()->associate(auth()->user());
            $task->save();

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

    public function toggleCompleted($id)
    {
        $task = Task::find($id);
        $task->completed_at = $task->completed_at ? null : now();
        $task->save();
        return redirect('/tasks');
    }

    public function showDeletedTasks()
    {
        return view('deletedTasks', ['tasks' => Task::onlyTrashed()->where('user_id', auth()->user()->id)->get()]);
    }

    public function deletePermanently($id)
    {
        $task = Task::withTrashed()->where('id', $id)->get();
        $task[0]->forceDelete();
        return redirect('/tasks/deleted');
    }

    public function restore($id)
    {
        $task = Task::withTrashed()->where('id', $id)->get();
        $task[0]->restore();
        return redirect('/tasks/deleted')->with('success', 'Restored successfully!');
    }

    public function clearDeleted()
    {
        $tasks = Task::onlyTrashed()->get();
        foreach ($tasks as $task)
        {
            $task->forceDelete();
        }
        return redirect('/tasks')->with('success', 'Deleted tasks cleared!');
    }
}
