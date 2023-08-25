@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><div class="row">
                    <div class="col-md-10">
                      <h3 >{{ __('New Employee') }}</h3>
                    </div>
                
                    <div class="col-md-2 float-right">
                        <button class="btn btn-primary" 
                  onclick="document.getElementById('employeeCreate').submit();">Save</button>
                        
                       </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form name="employeeCreate" id="employeeCreate" action="{{route('employee.store') }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" required class="form-control" id="name" placeholder="Task Title">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" required class="form-control" id="email" placeholder="Task Title">
                        </div>
                        <div class="form-group">
                            <label for="mobNo">Mobile Number</label>
                            <input type="text" name="mobNo" required class="form-control" id="mobNo" placeholder="Task Title">
                        </div>
                        <div class="form-group">
                            <label for="department">Department</label>
                            <select name="department" class="form-control">
                                @foreach ( $departments as $department)
                                    <option value="{{$department}}">{{$department}}</option>                                    
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Status">Status</label>
                            <select name="Status" class="form-control">
                                @foreach ( $statuses as $status)
                                    <option value="{{$status}}">{{$status}}</option>                                    
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
