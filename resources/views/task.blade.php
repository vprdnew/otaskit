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
                    <div class="card">
                        <div class="card-text">
                        <h3>{{$task->title}}</h3>({{$task->Status}})
                        <p>{{$task->description}}
                        </p>
                        <a class="nav-link" href="{{ route('task.edit',$task->id) }}">{{ __('Edit') }}</a>
                        </div>
                    </div>
                    
                        
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
