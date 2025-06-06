@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __($survey->title) }}</div>

                <div class="card-body">
                <a  class="btn btn-light" href="/surveys/{{$survey->id }}/questions/create">Add new question</a>
                <a  class="btn btn-light" href="/analyses/{{ $survey->id }}-{{ Str::slug($survey->title )}}">Take Survey</a>
                   
                </div>
            </div>

            @foreach($survey->questions as $question)
            <div class="card mt-4">
                <div class="card-header">{{ __($question->question) }}</div>

                <div class="card-body">
                    <ul class="list-group">
                         @foreach($question->answers as $answer) 
                            <li class="list-group-item d-flex justify-content-between">
                            <div>{{$answer->answer }}</div>
                            @if($question->responses->count())
                            <div>{{ intval(($answer->responses->count() * 100 / $question->responses->count() ))}}%</div>
                            @endif
                            </li>
                         @endforeach
                         </ul>
                     </div>
                    <div class="card-footer">
                    <form action="/surveys/{{ $survey->id }}/questions/{{$question->id }}" method="post">
                        @method('DELETE')
                        @csrf

                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete Quetion</button>
                    </form>
                </div>
              </div>
            @endforeach
         </div>
    </div>
</div>
@endsection