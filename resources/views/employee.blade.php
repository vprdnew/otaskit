@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><div class="row">
                    <div class="col-md-10">
                      <h3 >{{ __('Employees') }}</h3>
                    </div>
                
                    <div class="col-md-2 float-right">
                        <button class="col-md-12 btn btn-primary" 
                  onclick="window.location.href='{{ route('employee.create') }}';">Add</button>
                        
                       </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Name</th>
                              <th scope="col">Email</th>
                              <th scope="col">Mobile Number</th>
                              <th scope="col">Department</th>
                              <th scope="col">Status</th>
                            </tr>
                          </thead>
                          <tbody>
                    @foreach ($employees as $employee)
                    <tr>
                        <td>{{$employee->id}}</td>
                        <td>{{$employee->name}}</td>
                        <td>{{$employee->email}}</td>
                        <td>{{$employee->mobNo}}</td>
                        <td>{{$employee->department}}</td>
                        <td>{{$employee->Status}}</td>
                        
                        
                        <td><a class=" btn btn-primary" href="{{ route('employee.edit',$employee->id) }}">{{ __('Edit') }}</a></td>
                        
                    </tr>
                    
                        
                    @endforeach
                          </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
