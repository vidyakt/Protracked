@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-8">
                    <div class="card-title">
                        <h5 class="card-title">Add New Company</h5>
                    </div>
                </div>
                <div class="col-4 text-right">
                    <a class="btn btn-primary" href="{{ route('companies.index') }}"> Back</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('companies.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" placeholder="Name">
                    @error('name')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    @error('email')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputWebsite">Website</label>
                    <input type="website" name="website" class="form-control" value="{{ old('website') }}" id="exampleInputWebsite" placeholder="Website">
                    @error('website')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputWebsite">Logo</label>
                    <input type="file" name="logo" class="form-control">
                    @error('logo')
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