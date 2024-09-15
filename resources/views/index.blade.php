<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ContactForm</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/index.css">
</head>
<body>
  <div class="container">
    <p class="title">システムへのご意見をお聞かせください</p>
    <form action="{{ route('feedback.confirm') }}" method="post" class="feedback-form">
      @csrf
      <div class="form-item">
        <div class="label-container">
          <label for="fullname">氏名</label>
          <span class="required-mark">※</span>
        </div>
          <input type="text" name="fullname" id="name" placeholder="入力してください" value="{{old('fullname')}}" class="input-text">
      </div>
      @error('fullname')
        <p class="error-message">{{ $message }}</p>
      @enderror

      <div class="form-item">
        <div class="label-container">
          <label>性別</label>
          <span class="required-mark">※</span>
        </div>
        <label for="men" class="label-gender">
          <input type="radio" name="gender" value="1" class="input-radio" checked>男性
        </label>
        <label for="women" class="label-gender">
          <input type="radio" name="gender" value="2" class="input-radio" {{old('gender') == 2 ? 'checked' : ''}}>女性
        </label>
      </div>
      @error('gender')
        <p class="error-message">{{ $message }}</p>
      @enderror

      <div class="form-item">
        <div class="label-container">
          <label>年代</label>
          <span class="required-mark">※</span>
        </div>
          <select class="input-text" name="age">
            <option disabled selected>選択してください</option>
            @foreach($ages as $age)
              <option value={{$age}} {{old('age') == $age['sort'] ? 'selected' : ''}}>{{ $age['age'] }}</option>
            @endforeach
          </select>
      </div>
      @error('age')
        <p class="error-message">{{ $message }}</p>
      @enderror

      <div class="form-item">
        <div class="label-container">
          <label for="email">メールアドレス</label>
          <span class="required-mark">※</span>
        </div>
          <input type="text" name="email" id="email" placeholder="入力してください" value="{{old('email')}}" class="input-text">
      </div>
      @error('email')
        <p class="error-message">{{ $message }}</p>
      @enderror

      <div class="form-item">
        <div class="label-container">
          <label for="permission">メール送信可否</label>
        </div>
        <div class="permission-container">
          <p>登録したメールアドレスにメールマガジンをお送りしてもよろしいですか？</p>
          <div class="checkbox-container">
            <input type="checkbox" name="isSendEmail" {{ old('isSendEmail', 1) ? 'checked' : '' }} class="input-checkbox">
            <p>送信を許可します</p>
          </div>
        </div>
      </div>

      <div class="form-item">
        <div class="label-container label-feedback">
          <label for="feedback">ご意見</label>
        </div>
        <textarea name="feedback" id="feedback" placeholder="入力してください" class="input-text" rows="10">{{old('feedback')}}</textarea>
      </div>

      <button type="submit" class="button-main">確認</button>
    </form>
  </div>
</body>
</html>