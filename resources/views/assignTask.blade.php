@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><div class="row">
                    <div class="col-md-10">
                      <h3 >{{ $task->title }}</h3>
                    </div>
                
                    <div class="col-md-2 float-right">
                        <button class="btn btn-primary" 
                  onclick="document.getElementById('taskAssign').submit();">Assign</button>
                        
                       </div>
                    </div>

                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form name="taskAssign" id="taskAssign"  action="{{route('assign', $task->id) }}" method="POST">
                        @method('PUT')
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="taskDescription">Task Description</label>
                            <p>{{$task->description}}</p>
                          </div>
                          <div class="form-group">
                            <label for="Status">Employee</label>
                            <select name="assignee" class="form-control">
                                @foreach ( $employees as $employee)
                                    <option value="{{$employee->id}}">{{$employee->name}}</option>                                    
                                @endforeach
                            </select>
                        </div>

                          
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
