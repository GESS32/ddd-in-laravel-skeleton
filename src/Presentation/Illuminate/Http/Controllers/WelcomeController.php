<?php

namespace Presentation\Illuminate\Http\Controllers;

use Illuminate\Routing\Controller;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        return view('welcome');
    }
}
