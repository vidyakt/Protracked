@extends('layouts.app')

@section('content')
<div class="container">
    <h5>Employees</h5>
    <hr>
    <div class="col-12 p-0 text-left">
        <a class="btn btn-success mb-2" href="{{ route('employees.create') }}">Create New Employee</a>
    </div>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Employees List</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <table class="table table-bordered">
                    <tr>
                        <th>Company</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th width="280px">Action</th>
                    </tr>
                    @if($employees->count() > 0)
                    @foreach ($employees as $employee)
                    <tr>
                        <td>{{$employee->company ? $employee->company->name : '-'}}</td>
                        <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->phone }}</td>
                        <td>
                            <form action="{{ route('employees.destroy',$employee->id) }}" method="POST">

                                <a class="btn btn-info" href="{{ route('employees.show',$employee->id) }}">Show</a>

                                <a class="btn btn-primary" href="{{ route('employees.edit',$employee->id) }}">Edit</a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr class="text-center">
                        <td colspan="6">No Employees were found!</td>
                    </tr>
                    @endif
                </table>

                <div class="col-12">
                    {!! $employees->links() !!}
                </div>
            </div>
        </div>

    </div>


</div>
@endsection