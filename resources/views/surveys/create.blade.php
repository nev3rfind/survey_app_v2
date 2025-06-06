@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create New Survey') }}</div>

                <div class="card-body">
                   <form action="/surveys" method="post">

                   @csrf

                    <div class="form-group">
                        <label for="title">Title of Survey</label>
                        <input name="title" type="text" class="form-control" id="title" aria-describedby="titleHelp" placeholder="Enter Title">
                        <small id="emailHelp" class="form-text text-muted">Give your survey attracting title</small>
                        @error('title')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="purpose">Description</label>
                        <input name="purpose" type="text" class="form-control" id="purppse" aria-describedby="purposeHelp" placeholder="Enter Description">
                        <small id="purposeHelp" class="form-text text-muted">Please add a brief description about survey</small>
                        @error('purpose')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Create survey</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
