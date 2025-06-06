<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Everysurvey;
use \App\Models\Question;

class SurveyController extends Controller
{
    public function create(Everysurvey $survey)
    {
        return view('question.create', compact('survey'));
    }

    public function store(Everysurvey $survey)
    {
    //    dd(request()->all());

    $data = request()->validate([ //validating data
        'question.question' => 'required',
        'answers.*.answer' => 'required', //this is array
    ]);

  // dd(request()->all());
    $question = $survey->questions()->create($data['question']); //questions relationship
    $question->answers()->createMany($data['answers']); //answers relationship

    return redirect('/surveys/'.$survey->id); //return to survey
    }

    public function destroy(Everysurvey $survey, Question $question)
    {
        $question->answers()->delete();
        $question->delete();

        return redirect($survey->path());
    }
}
