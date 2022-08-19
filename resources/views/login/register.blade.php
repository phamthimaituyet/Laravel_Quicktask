<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="{{ asset('assets/css/register.css') }}" rel="stylesheet">
</head>

<body>
    @if (session('thongbao'))
    <div class="alert alert-danger">
        {{session('thongbao')}}
    </div>
    @endif
    <div class="form">
        <div class="form__right">
            <div class="form__padding-right">
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <h1 class="form__title">Member Singup</h1>
                    <input class="form__name" type="text" placeholder="username" name="username" />
                    <div class="full_name">
                        <input class="form__name" type="text" placeholder="first name" name="first_name" style="margin-right: 10px;" />
                        <input class="form__name" type="text" placeholder="last name" name="last_name" />
                    </div>
                    <input class="form__email" type="text" placeholder="email" name="email" />
                    <input class="form__password" type="password" placeholder="******" name="password" />
                    <input class="form__submit-btn" type="submit" value="Login" />
                </form>
                <p><a class="form__link" href="login">Login</a></p>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
