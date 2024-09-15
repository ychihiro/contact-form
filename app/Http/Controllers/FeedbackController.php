<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use App\Models\Age;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $ages = Age::all();
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

}
