@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/management/index.css')}}">
@endsection

@section('content')
<div class="container">
  <p class="title">アンケート管理システム</p>
  <form action="{{route('management.search')}}" method="get" class="search-form">
    @csrf
    <div class="form-item-container">
      <div class="form-item">
        <label for="name" class="label-container">氏名</label>
        <input type="text" name="fullname" id="name" placeholder="入力してください" class="input-text search-input-text">
      </div>

      <div class="form-item">
        <label class="label-container">年代</label>
        <select class="input-text search-input-text" name="age">
          <option disabled selected>すべて</option>
          @foreach($ages as $age)
          <option value={{$age}}>{{ $age['age'] }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-item form">
        <label class="label-container">性別</label>
        <label for="all" class="label-gender">
          <input type="radio" name="gender" value="0" class="input-radio" checked>すべて
        </label>
        <label for="men" class="label-gender">
          <input type="radio" name="gender" value="1" class="input-radio">男性
        </label>
        <label for="women" class="label-gender">
          <input type="radio" name="gender" value="2" class="input-radio" {{old('gender') == 2 ? 'checked' : ''}}>女性
        </label>
      </div>
    </div>

    <div class="form-item-container">
      <div class="form-item">
        <label for="date" class="label-container">登録日</label>
        <div class="input-date">
          <input type="date" name="startDate" id="date" class="input-text search-input-text">
          <span>~</span>
          <input type="date" name="endDate" id="date" class="input-text search-input-text">
        </div>
      </div>

      <div class="form-item">
        <label for="date" class="label-container">メール送信可否</label>
        <div class="checkbox-container">
          <input type="checkbox" name="isSendEmail" class="input-checkbox">
          <p>許可のみ</p>
        </div>
      </div>
    </div>

    <div class="form-item-container">
      <div class="form-item">
        <label for="keyword" class="label-container">キーワード</label>
        <input type="text" name="keyword" id="keyword" placeholder="入力してください" class="input-text search-input-text">
      </div>
    </div>

    <div class="button-container">
      <button type="submit" name="reset" class="button-sub">リセット</button>
      <button type="submit" name="search" class="button-main">検索</button>
    </div>
  </form>

  <div class="pagination">
    {{ $answers->links() }}
  </div>


  <table>
    <tr>
      <th>ID</th>
      <th>氏名</th>
      <th>性別</th>
      <th>年代</th>
      <th>内容</th>
      <th></th>
    </tr>

    @foreach($answers as $answer)
    <tr>
      <td>{{$answer['id']}}</td>
      <td>{{$answer['fullname']}}</td>
      <td>{{$answer['gender'] === 1 ? '男性' : '女性'}}</td>
      <td>{{$answer['age']}}</td>
      <td class="feedback">{{$answer['feedback']}}</td>
      <td class="td-detail">
        <a href="{{ route('management.show', ['id'=>$answer['id']])}}" class="button-main">
          詳細
        </a>
      </td>
    </tr>
    @endforeach
  </table>

</div>
@endsection

@section('js')
<script src="js/management/character-limit.js"></script>
@endsection