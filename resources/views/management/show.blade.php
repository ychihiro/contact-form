@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/management/show.css')}}">
@endsection

@section('content')
<div class="container">
  <p class="title">アンケート管理システム</p>
  <div class="feedback-form detail">
    <div class="form-item">
      <div class="label-container">
        <p>ID</p>
      </div>
      <p>{{$answer['id']}}</p>
    </div>

    <div class="form-item">
      <div class="label-container">
        <p>氏名</p>
      </div>
      <p>{{$answer['fullname']}}</p>
    </div>

    <div class="form-item">
      <div class="label-container">
        <p>性別</p>
      </div>
      <p>{{$answer['gender'] == 1 ? '男性' : '女性'}}</p>
    </div>

    <div class="form-item">
      <div class="label-container">
        <p>年代</p>
      </div>
      <p>{{$answer['age']}}</p>
    </div>

    <div class="form-item">
      <div class="label-container">
        <p>メールアドレス</p>
      </div>
      <p>{{$answer['email']}}</p>
    </div>

    <div class="form-item">
      <div class="label-container">
        <p>メール送信可否</p>
      </div>
      <p>{{$answer['isSendEmail'] === 1 ? '送信許可' : '送信拒否'}}</p>
    </div>

    <div class="form-item">
      <div class="label-container">
        <p>ご意見</p>
      </div>
      <p>{{$answer['feedback']}}</p>
    </div>

    <div class="form-item">
      <div class="label-container">
        <p>登録日時</p>
      </div>
      <p>{{$answer['created_at']}}</p>
    </div>

    <div class="button-container">
      <a href="{{route('management.index')}}" class="button-main back-button">一覧に戻る</a>
      <form action="{{ route('management.delete', ['id'=>$answer['id']]) }}" method="post">
        @csrf
        <button type="submit" class="button-sub delete-button">削除</button>
      </form>
    </div>
  </div>
</div>
@endsection