<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'fullname' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'email' => 'required|email',
        ];
    }

    public function messages(): array
    {
        return [
            'fullname.required' => '名前を入力してください',
            'gender.required' => '性別を選択してください',
            'age.required' => '年代を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスの形式が正しくありません',
        ];

    }
}
