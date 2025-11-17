<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssistanceController extends Controller
{
    public function index()
    {
        // For now, just return the assistance view
        return view('assistance.index');
    }
} 