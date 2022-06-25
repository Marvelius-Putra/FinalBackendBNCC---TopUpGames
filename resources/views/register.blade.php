<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/register.css') }} ">

</head>
<body>

    {{-- Register form --}}
    <script src="public/css/register.js"></script>
    <div class="box">
        <img src="public/images/game.webp" alt="" class="logo">
        <h3>Register</h1>

        <form action="/register" class="form" id="form" name="myForm" method="POST">
            @csrf
            <div class="content">
                <label for="">Name</label>
                <input type="text" name = "name", id = "name" placeholder = "Name" >
                <div class="underline"></div>
                <div id="error-user" style="color:rgb(208, 26, 26)"></div>
            </div>

            <div class="content">
                <label for="">Email</label>
                <input type="email" name = "email", id = "email" placeholder = "Email" >
                <div class="underline"></div>
                <div id="error-user" style="color:rgb(208, 26, 26)"></div>
            </div>

            <div class="content">
                <label for="">Password</label>
                <input type="password" name = "password", id = "password" placeholder = "Password">
                <div class="underline"></div>
                <div id="error-pass" style="color:rgb(208, 26, 26)"></div>
            </div>

            <div class="content">
                <label for="">Phone Number</label>
                <input type="text" name = "phone", id = "phone" placeholder = "phone number" >
                <div class="underline"></div>
                <div id="error-user" style="color:rgb(208, 26, 26)"></div>
            </div>

            <div class="button">
                <input type="submit">
                <p class="text-center text-muted mt-5 mb-0">Already have an account? <a href="/login" class="fw-bold text-body"><u>Login here</u></a></p>
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
