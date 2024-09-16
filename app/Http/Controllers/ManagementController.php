<?php

namespace App\Http\Controllers;

use App\Models\Age;
use App\Models\Answer;
use Illuminate\Http\Request;

class ManagementController extends Controller
{
  public function index()
  {
    $answers = Answer::paginate(10);

    foreach ($answers as $answer) {
      $answer->age = Age::find($answer->age_id)->age;
    }

    $ages = Age::all();

    return view('management.index', compact('answers', 'ages'));
  }
}
