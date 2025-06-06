<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeepSurveyController extends Controller
{
    public function show(\App\Models\Everysurvey $survey, $slug)
    {
        $survey->load('questions.answers');
        return view('survey.show', compact('survey'));
    }

    public function store(\App\Models\Everysurvey $survey)
    {
       // dd(request()->all());
        $data = request()->validate([
            'responses.*.answer_id' => 'required',
            'responses.*.question_id' => 'required',
            'survey.name' => 'required',
            'survey.email' => 'required',
        ]);

        $defSurvey = $survey->surveys()->create($data['survey']);
        $defSurvey->responses()->createMany($data['responses']);
        
        //
   // dd(request()->all());
      // dd($data['name']);
       // $user_name = auth()->user()->name;
       // $user_email = auth()->user()->email;
            //$data = array_push($data, 'name', $user_name);
           // $data = array_push($data, 'email', $user_email);
         //  $data['name'] = $user_name;
          // $data[' $user_email;
   // $defSurvey = $survey->surveys()->create($data['survey']);
  // $defSurvey = responses()->createMany($data['responses']);email'] =
  // dd($data);
        //dd(auth()->user()->name);
        //dd(request()->all());
        return view('question.show');
    }
}
