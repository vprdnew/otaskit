<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //
    public $department = [];
    public $status = [];
    public function __construct()
    {
        $this->middleware('auth');
        $this->department = ['sales','Marketing','IT'];
        $this->status = ['Active','Inactive'];
    }

    public function index()
    {
        $employees = Employee::get();
        return view('employee',compact('employees'));

    }

    public function create() 
    {

        $departments = $this->department;
        $statuses = $this->status;
        return view('createEmployee',compact('departments','statuses'));
    }

    public function store (Request $request)
    {
        $request->validate([
            'name' =>'required',
            'email' => 'required',
            'mobNo' => 'required'
        ]);
        $employee = new Employee();
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->mobNo = $request->mobNo;
        $employee->department = $request->department;
        $employee->Status = $request->Status;
        $employee->save();
        return redirect()->route('employee.index');
    }

    public function edit($taskId){
        $employee = Employee::findOrFail($taskId);
        $departments = $this->department;
        $statuses = $this->status;
            return view('editEmployee',compact('departments','statuses','employee'));
        
    }

    public function update(Request $request,$id){
        $request->validate([
            'name' =>'required',
            'email' => 'required',
            'mobNo' => 'required'
        ]);
        $employee = Employee::findOrfail($id);

        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->mobNo = $request->mobNo;
        $employee->department = $request->department;
        $employee->Status = $request->Status;
        $employee->save();
        return redirect()->route('employee.index');
    }

    public function destroy($id){
        Employee::where('id', $id)->delete();
        return redirect()->route('employee.index');
    }

}
