<?php

namespace App\Http\Controllers;

use App\Models\Age;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $ages = Age::all();
        return view('index', ['ages' => $ages]);
    }

}
