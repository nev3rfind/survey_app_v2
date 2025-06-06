<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EverysurveysController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); //preventing someone who is not logged in to create survey
    }
    public function create()
    {
        return view('surveys.create');
    }
    
    public function store()
    {
        $data = request()->validate([
            'title' => 'required',
            'purpose' => 'required',
        ]);

        // $data['user_id'] = auth()->user()->id;

        // $survey = \App\Models\Everysurvey::create($data);

        $survey = auth()->user()->surveys()->create($data);

        return redirect('/surveys/'.$survey->id);
    }

    public function show (\App\Models\Everysurvey $survey)
    {
        $survey->load('questions.answers.responses');
       //dd($survey);

        return view('surveys.show', compact('survey'));
    }


}
