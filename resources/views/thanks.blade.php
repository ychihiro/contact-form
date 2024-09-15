@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="css/thanks.css">
@endsection

@section('content')
    <div class="container">
        <div class="thanks-container">
            <p class="title">ご意見をお送りいただきありがとうございました</p>
            <a href={{route('feedback.index')}} class="button-main">トップページへ戻る</a>
        </div>
    </div>
@endsection