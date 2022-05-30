<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }} ">
</head>
<body>

    {{-- login form --}}
    <div class="box">
        <img src="public/images/game.webp" alt="" class="logo">
        <h3>LOGIN</h1>

        <form action="/login" class="form" id="form" name="myForm" method="POST">
            @csrf
            <div class="content">
                <label for="">Email</label>
                <input type="email" name = "email", id = "email" placeholder = "Email" value={{Cookie::get('remembercookie') !== null ? Cookie::get('remembercookie') :''}}>
                <div class="underline"></div>
                <div id="error-user" style="color:rgb(208, 26, 26)"></div>
            </div>

            <div class="content">
                <label for="">Password</label>
                <input type="password" name = "password", id = "password" placeholder = "Password">
                <div class="underline"></div>
                <div id="error-pass" style="color:rgb(208, 26, 26)"></div>
            </div>

            <div class="forgot-pass">
                <input type="checkbox" value = "remember" name="remember" id="remember" checked={{Cookie::get('remembercookie')!== null}}>remember me
            </div>

            <div class="button">
                <input type="submit">
            </div>

            <div class="no-account">
                <a href="#" type="submit">Don't have account yet?</a>
            </div>
            {{-- error message --}}
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <strong><i  style="color:rgba(194, 14, 14, 0.673)">{{$error}}</i></strong><br>
                @endforeach
            @endif
        </form>
    </div>
</body>
</html>
