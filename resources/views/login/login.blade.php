<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="{{ asset('assets/css/login.css') }}" rel="stylesheet">
</head>

<body>
    @if (session('thongbao'))
    <div class="alert alert-danger">
        {{ session('thongbao') }}
    </div>
    @endif
    <div class="lang">
        <button><a href="{{ route('lang',['lang' => 'vi']) }}">Việt Nam</a></button>
        <button><a href="{{ route('lang',['lang' => 'en' ]) }}">English</a></button>
    </div>
    <div class="form">
        <div class="form__box">
            <div class="form__left">
                <div class="form__padding"><img class="form__image" src=" {{ asset('/assets/img/R.jfif') }} " />
                </div>
            </div>
            <div class="form__right">
                <div class="form__padding-right">
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <h1 class="form__title">{{ trans('messages.login.member_login') }}</h1>
                        <input class="form__email" type="text" placeholder="email" name="email" />
                        <input class="form__password" type="password" placeholder="******" name="password" />
                        <input class="form__submit-btn" type="submit" value="{{ trans('messages.login.login') }}" />
                    </form>
                    <p><a class="form__link" href="register">{{ trans('messages.login.create_your_account') }}</a></p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
