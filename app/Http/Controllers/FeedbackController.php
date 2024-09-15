<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use App\Models\Age;
use App\Models\Answer;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $ages = Age::orderBy('sort')->get();
        return view('index', ['ages' => $ages]);
    }

    public function confirm(FeedbackRequest $request)
    {
        $property = $request->only(['fullname', 'gender', 'age', 'email', 'isSendEmail', 'feedback']);

        // オブジェクトに変換
        $property['age'] = json_decode($property['age']);

        // email送信可否
        $property['isSendEmail'] = $request->has('isSendEmail') ? 1 : 0;

        return view('confirm', ['property' => $property]);
    }

    public function create(FeedbackRequest $request)
    {
        if ($request->has('back')) {
            return redirect()->route('feedback.index')->withInput();
        }

        $property = $request->only(['fullname', 'gender', 'age', 'email', 'isSendEmail', 'feedback']);

        Answer::create([
                'fullname' => $property['fullname'],
                'gender'=> $property['gender'],
                'age_id' => $property['age'],
                'email' => $property['email'],
                'is_send_email' => $property['isSendEmail'],
                'feedback' => $property['feedback'],
            ]);

        session()->flash('success', 'アンケートを送信しました');

        return redirect()->route('feedback.index');
    }

}
