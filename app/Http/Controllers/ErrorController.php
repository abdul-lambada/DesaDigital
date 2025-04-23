<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function notFound()
    {
        return response()->view('errors.404', [], 404);
    }
}
