<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ContactForm</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/confirm.css">
</head>
<body>
    <div class="container">
        <p class="title">内容確認</p>
        <form action="{{ route('feedback.create') }}" method="post" class="feedback-form confirm-form">
            @csrf
            <div class="form-item">
                <div class="label-container">
                    <p>氏名</p>
                </div>
                <p>{{$property['fullname']}}</p>
            </div>
            <input type="hidden" name="fullname" value={{$property['fullname']}}>

            <div class="form-item">
                <div class="label-container">
                    <p>性別</p>
                </div>
                <p>{{$property['gender'] === 1 ? '男性' : '女性'}}</p>
            </div>
            <input type="hidden" name="gender" value={{$property['gender']}}>

            <div class="form-item">
                <div class="label-container">
                    <p>年代</p>
                </div>
                <p>{{$property['age']->age}}</p>
            </div>
            <input type="hidden" name="age" value={{$property['age']}}>

            <div class="form-item">
                <div class="label-container">
                    <p>メールアドレス</p>
                </div>
                <p>{{$property['email']}}</p>
            </div>
            <input type="hidden" name="email" value={{$property['email']}}>

            <div class="form-item">
                <div class="label-container">
                    <p>メール送信可否</p>
                </div>
                <p>{{$property['isSendEmail'] === 1 ? '送信許可' : '送信拒否'}}</p>
            </div>
            <input type="hidden" name="isSendEmail" value={{$property['isSendEmail']}}>

            <div class="form-item">
                <div class="label-container">
                    <p>ご意見</p>
                </div>
                <p>{{$property['feedback']}}</p>
            </div>
            <input type="hidden" name="feedback" value={{$property['feedback']}}>

            <div class="button-container">
                <button type="submit" name="back" class="button-sub">再入力</button>
                <button type="submit" name="send" class="button-main">送信</button>
            </div>
        </form>
    </div>
</body>
</html>