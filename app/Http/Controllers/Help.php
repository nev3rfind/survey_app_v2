<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Help extends Controller
{
    public function show()
    {
        return view('help.show');
    }
    public function showcontact()
    {
        return view('help.contact');
    }
}
