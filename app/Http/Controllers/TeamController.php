<?php

namespace App\Http\Controllers;

class TeamController extends Controller
{
    public function __invoke()
    {
        return view('pages.team');
    }
}