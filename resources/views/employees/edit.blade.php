@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-8">
                    <div class="card-title">
                        <h5 class="card-title">Edit Employee</h5>
                    </div>
                </div>
                <div class="col-4 text-right">
                    <a class="btn btn-primary" href="{{ route('employees.index') }}">Back</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('employees.update', $employee->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="company_id">Company</label>
                    <select name="company_id" id="company_id" class="form-control">
                        <option value="" selected>Select Company</option>
                        @foreach ($companies as $company)
                        @if($employee->company_id == $company->id)
                        <option value="{{$company->id}}" selected>{{$company->name}}</option>
                        @else
                        <option value="{{$company->id}}">{{$company->name}}</option>
                        @endif
                        @endforeach
                    </select>
                    @error('company_id')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input type="text" name="first_name" value="{{$employee->first_name}}" class="form-control" id="firstName" placeholder="First Name">
                    @error('first_name')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input type="text" name="last_name" value="{{$employee->last_name}}" class="form-control" id="lastName" placeholder="Last Name">
                    @error('last_name')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" value="{{$employee->email}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    @error('email')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPhone">Phone</label>
                    <input type="phone" name="phone" value="{{$employee->phone}}" class="form-control" id="exampleInputPhone" placeholder="Phone">
                    @error('phone')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection