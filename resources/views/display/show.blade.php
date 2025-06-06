@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card mt-2">
                <div class="card-header">{{ __('All Active Surveys') }}</div>

                <div class="card-body">
                 <ul class="list-group">
                    @foreach($surveys as $survey)
                    <li class="list-group-item">
                     <h4>   <a href="../analyses/{{$survey->id}}-{{$survey->title}}">{{ $survey->title}}</a></h4>
                        <div class="mt-2">
                            <small class="font-weight-bold">Desription: {{$survey->purpose}}</small>
                            <p>
                            <small class="font-weight-light">Created: {{$survey->created_at}}</small>
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
</div>
@endsection
