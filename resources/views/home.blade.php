  
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                  <a href="surveys/create" class="btn btn-success">Create New Survey</a>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">{{ __('My Surveys') }}</div>

                <div class="card-body">
                 <ul class="list-group">
                    @foreach($surveys as $survey)
                    <li class="list-group-item">
                        <a href="{{$survey->path() }}">{{ $survey->title}}</a>
                        <div class="mt-2">
                            <small class="font-weight-bold">Share URL</small>
                            <p>
                            <a href="{{$survey->publicPath()}}">
                            {{$survey->publicPath()}}
                            </a>
                            </p>
                         </div>   
                    </li>
                    @endforeach
                 </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
