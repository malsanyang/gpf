<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class WelcomeController extends Controller
{
    public function show(): Response
    {
        return Inertia::render('Welcome/Show', ['data' => ['title' => 'Welcome', 'message' => 'Developers of the world! from me']]);
    }
}
