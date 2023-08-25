<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tasks = Task::get();
        return view('task',compact('tasks'));

    }

    public function create() 
    {
        return view('createTask');
    }

    public function store (Request $request)
    {
        $request->validate([
            'title' =>'required'
        ]);
        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->save();
        return redirect()->route('task.index');
    }

    public function edit($taskId){
        $task = Task::findOrFail($taskId);
            return view('editTask');
        
    }
}
