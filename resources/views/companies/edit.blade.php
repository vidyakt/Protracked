@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-8">
                <div class="card-title">
                        <h5 class="card-title">Edit Company</h5>
                    </div>
                </div>
                <div class="col-4 text-right">
                    <a class="btn btn-primary" href="{{ route('companies.index') }}"> Back</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('companies.update', $company->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{ $company->name }}" class="form-control" id="name" placeholder="Name">
                    @error('name')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" value="{{ $company->email }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    @error('email')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputWebsite">Website</label>
                    <input type="website" name="website" value="{{ $company->website }}" class="form-control" id="exampleInputWebsite" placeholder="Website">
                </div>
                <div class="form-group">
                    <label for="exampleInputWebsite">Logo</label>
                    <img style="max-width:5%;" src="{{asset('storage/' . $company->logo)}}" alt="logo" class="img-fluid">
                    <input type="file" name="logo" class="form-control">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>


</div>

@endsection