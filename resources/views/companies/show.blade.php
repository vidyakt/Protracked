@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h5 class="card-title">Company Details</h5>
                </div>
                <div class="col-6 text-right">
                    <a class="btn btn-primary" href="{{ route('companies.index') }}">Back</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {{ $company->name }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email:</strong>
                        {{ $company->email }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Website:</strong>
                        {{ $company->website }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Logo:</strong>
                        <img style="max-width:5%" src="{{asset('storage/' . $company->logo)}}" alt="logo">
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection