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


  public function search(Request $request)
  {

    // dd($request->all());

    $request['age'] = json_decode($request['age'], true);

    // dd($request->all());

    if ($request->has('reset')) {
      return redirect()->route('management.index')->withInput();
    }

    $query = Answer::query();

    if (!empty($request->fullname)) {
      $query->where('fullname', 'like', '%' . $request->fullname . '%');
    }

    if (!empty($request->age)) {
      $query->where('age_id', '=', $request['age']['id']);
    }

    if (!empty($request->gender)) {
      $query->where('gender', '=', $request->gender);
    }

    if (!empty($request->keyword)) {
      $query->where(function ($q) use ($request) {
        $q->where('email', 'like', '%' . $request->keyword . '%');
        $q->where('feedback', 'like', '%' . $request->keyword . '%');
      });
    }

    if (!empty($request->date)) {
      $query->whereDate('created_at', '=', $request->date);
    }

    if (!empty($request->isSendEmail)) {
      $query->where('is_send_email', '=', $request->isSendEmail);
    }

    $answers = $query->paginate(10);

    foreach ($answers as $answer) {
      $answer->age = Age::find($answer->age_id)->age;
    }

    $ages = Age::all();

    return view('management.index', compact('answers', 'ages'));
  }


  public function show($id)
  {
    $answer = Answer::find($id);
    $answer->age = Age::find($answer->age_id)->age;

    return view('management.show', compact('answer'));
  }


  public function delete($id)
  {
    Answer::destroy($id);

    return redirect()->route('management.index');
  }
}
