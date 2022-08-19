@extends('layouts.app')

@section('content')
<div class="container">
    <h5>Companies</h5>
    <hr>
    <div class="col-12 p-0 text-left">
        <a class="btn btn-success mb-2" href="{{ route('companies.create') }}">Create New Company</a>
    </div>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Companies List</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Website</th>
                        <th>Logo</th>
                        <th width="280px">Action</th>
                    </tr>
                    @if($companies->count() > 0)
                    @foreach ($companies as $company)
                    <tr>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->email }}</td>
                        <td>{{ $company->website }}</td>
                        <td><img style="max-width:30%;" src="{{asset('storage/' . $company->logo)}}" alt="logo" class="img-fluid" text-center></td>
                        <td>
                            <form action="{{ route('companies.destroy',$company->id) }}" method="POST">
                                <a class="btn btn-primary" href="{{ route('companies.edit',$company->id) }}">Edit</a>
                                <a class="btn btn-info" href="{{ route('companies.show',$company->id) }}">Show</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr class="text-center">
                        <td colspan="6">No Companies were found!</td>
                    </tr>
                    @endif
                </table>

                <div class="col-12">
                    {{ $companies->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection