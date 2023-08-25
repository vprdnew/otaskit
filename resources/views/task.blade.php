@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><div class="row">
                    <div class="col-md-10">
                      <h3 >{{ __('Task') }}</h3>
                    </div>
                
                    <div class="col-md-2 float-right">
                        <button class="btn btn-primary" 
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
                          <h6 class="card-subtitle mb-2 text-muted">{{$task->Status}}</h6>
                          <p class="card-text">{{$task->description}}</p>
                          <a href="{{ route('task.edit',$task->id) }}" class="card-link">{{ __('Edit') }}</a>
                          <a href="#" class="card-link">Assign</a>
                        </div>
                      </div>
                    
                        
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
