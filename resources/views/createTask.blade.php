@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><div class="row">
                    <div class="col-md-10">
                      <h3 >{{ __('New Task') }}</h3>
                    </div>
                
                    <div class="col-md-2 float-right">
                        <button class="btn btn-primary" 
                  onclick="document.getElementById('taskCreate').submit();">Save</button>
                        
                       </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form name="taskCreate" id="taskCreate" action="{{route('task.store') }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="tasktitle">Task Title</label>
                            <input type="text" name="title" required class="form-control" id="tasktitle" placeholder="Task Title">
                        </div>
                        <div class="form-group">
                            <label for="taskDescription">Task Description</label>
                            <textarea class="form-control"name="description" id="taskDescription" rows="3"></textarea>
                          </div>
                          
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
