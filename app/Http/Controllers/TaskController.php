<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Employee;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public $status= ['Unassigned','Assigned','InProgress','Done'];
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $filterAssignee = $request->assignee;
        $filterStatus = $request->status;
        $tasks = Task::with('assignee');
        if($request->assignee){
            if($request->assignee != 0 ){
                $tasks = $tasks->where('employee_id',$request->assignee);       
            }
        }
        if($request->status){
            if($request->status != 'all' ){
                
                    $tasks = $tasks->where('Status',$request->status);       
                
            }
        }

        $tasks = $tasks->get();
        $employees = Employee::get();
        $statuses = $this->status;
        return view('task',compact('tasks','employees','statuses','filterAssignee','filterStatus'));

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
        $task = Task::findOrFail($taskId);
        if($task->Status != 'InProgress'){
            $task->employee_id = $request->assignee;
            $task->Status = 'Assigned';
        }
        
        $task->save();
        return redirect()->route('task.index');
    }

    public function startTask($taskId){
        $task = Task::findOrFail($taskId);
        if($task->Status === 'Assigned'){
            $task->Status ='InProgress';
        }
        $task->save();
        return redirect()->route('task.index');
    }

    public function finishTask($taskId){
        $task = Task::findOrFail($taskId);
        
        if($task->Status === 'InProgress' && round(abs(time() - strtotime($task->updated_at))/60,2) > 5){
            $task->Status ='Done';
        }
        $task->save();
        return redirect()->route('task.index');
    }

    
}
