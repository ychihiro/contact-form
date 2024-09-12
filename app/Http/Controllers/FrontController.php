<?php

namespace App\Http\Controllers;

use App\Models\Age;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $ages = Age::all();
        return view('index', ['ages' => $ages]);
    }
}
