<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Employee;
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

    public function assign($taskId){
        $task = Task::findOrFail($taskId);
        $employees = Employee::where('Status', 'Active')->get();
        return view('assignTask',compact('task','employees'));
    }

    public function assignUpdate(Request $request,$taskId){
        $request->validate([
            'assignee' =>'required'
        ]);
    }
}
