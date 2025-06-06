<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DisplaySurveys extends Controller
{
    public function show()
    {
       // $surveys = auth()->user()->surveys;
      $surveys = DB::select('select * from everysurveys');
    //$surveys=$survey->load('questions.answers.responses');
    
        return view('display.show', compact('surveys'));
    }
}
