@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

        <h1>{{$survey->title }}</h1>

        <form action="/analyses/{{$survey->id}}-{{Str::slug($survey->title)}}" method="post">
        @csrf

        @foreach($survey->questions as $key => $question)
        <div class="card mt-4">
                <div class="card-header"><strong>{{$key + 1 }}. </strong>{{ ($question->question) }}</div>

                <div class="card-body">
                    @error('responses.' .$key. '.answer_id')
                        <small class='text-danger'>{{$message}}</small>
                    @enderror
                    <ul class="list-group">
                         @foreach($question->answers as $answer) 
                            <label for="answer{{$answer->id }}">
                            <li class="list-group-item">
                                <input type="radio" name="responses[{{$key}}][answer_id]" id="answer{{$answer->id }}"
                                {{ (old('responses.' .$key. '.answer_id') == $answer->id) ? 'checked' : ''}}
                                class="mr-2" value="{{ $answer->id }}">
                                {{$answer->answer}}

                                <input type="hidden" name="responses[{{$key }}][question_id]" value="{{$question->id}}">

                            </li>
                            </label>
                         @endforeach
                  </ul>
                </div>
            </div>
        @endforeach
        <input name="survey[name]" type="hidden" id="name" value="{{auth()->user()->name}}">
<input name="survey[email]" type="hidden" id="email" value="{{auth()->user()->email}}">
    <button class="btn btn-dark" type="submit">Complete Survey</button>
        </form>
            <!-- <div class="card">
                <div class="card-header">{{ __('Create New Survey') }}</div>

                <div class="card-body">
                   <form action="#" method="post">

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
            </div> -->
        </div>
    </div>
</div>
@endsection
