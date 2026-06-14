<?php

declare(strict_types=1);

namespace Presentation\Illuminate\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;

class WelcomeController extends Controller
{
    public function __invoke(): View
    {
        return view('welcome');
    }
}
