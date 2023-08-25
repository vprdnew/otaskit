@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><div class="row">
                    <div class="col-md-4">
                      <h3 >{{ __('Task') }}</h3>
                    </div>
                    <div class="col-md-6 float-right">
                        <form method="get" action="{{route('task.index')}}">
                        <div class="col-md-4 form-group" style="float:left">
                                <label for="Status">Employee</label>
                                <select name="assignee" class="form-control">
                                    <option value="0">All</option>                                    
                                    @foreach ( $employees as $employee)
                                        <option value="{{$employee->id}}" {{ $filterAssignee == $employee->id ? 'selected':''}}>{{$employee->name}}</option>                                    
                                    @endforeach
                                </select>
                            </div>
                        
                            <div class="col-md-4 form-group" style="float:left">
                                <label for="Status">Status</label>
                                <select name="status" class="form-control">
                                    <option value="all">All</option>                                    
                                    @foreach ( $statuses as $status)
                                        <option value="{{$status}}" {{ $filterStatus == $status?'selected':''}}>{{$status}}</option>                                    
                                    @endforeach
                                </select>
                            </div>
                        
                        <div class="col-md-4  form-group" style="float:left">
                            <label for="Status">&nbsp;</label>
                            <button class="col-md-12 btn btn-dark" onclick="window.location.href='{{ route('task.index') }}';">Filter</button>
                            
                        </div>
                        </form>
                    </div>
                    <div class="col-md-2 float-right">
                        <label for="Status">&nbsp;</label>
                        <button class="col-md-12 btn btn-primary" 
                  onclick="window.location.href='{{ route('task.create') }}';">Add</button>
                        
                       </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach ($tasks as $task)
                    <div class="card" style="width: 16rem;float: left;margin: 5px;">
                        <div class="card-body">
                          <h5 class="card-title">{{$task->title}}</h5>
                          <h6 class="card-subtitle mb-2 text-muted">{{$task->Status}}
                            @if ( $task->Status === 'Assigned')
                            <span>to {{$task->assignee->name}}</span>
                            @endif    
                        </h6>
                          <p class="card-text">{{$task->description}}</p>
                          <a href="{{ route('task.edit',$task->id) }}" class="card-link">{{ __('Edit') }}</a>
                          <a href="{{ route('assign',$task->id) }}" class="card-link">{{ $task->Status === 'Assigned'?'Change Assigne':'Assign'}}</a>

                        </div>
                        <div class="card-footer text-center">
                            
                            @if ($task->Status === 'InProgress')
                                @if (round(abs(time() - strtotime($task->updated_at))/60,2) > 5)
                                    <a class=" btn btn-success col-md-12" href="{{ route('finishTask',$task->id) }}">{{ __('Done') }}</a>
                                @endif
                                @elseif ($task->Status === 'Assigned')
                                <a class=" btn btn-info col-md-12" href="{{ route('startTask',$task->id) }}">{{ __('Start Task') }}</a>
                            @endif
                            
                        </div>
                      </div>
                    
                        
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
