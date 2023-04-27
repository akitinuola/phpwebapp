<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ url('css/login.css') }}">
</head>

<body>
    <div class="login">

        <div class="login-triangle"></div>

        <h2 class="login-header">Log in</h2>

        <form action="{{ url('login-user') }}" method="post" class="login-container">
            @csrf
                    @if (count($errors))
                    @foreach ($errors->all() as $error)
                        <div style="color: black;"> {{ $error }}</div>
                    @endforeach
                @endif
            <p><input class="text email" type="email" name="email" placeholder="Email"
                value="{{ old('email') }}" required></p>
            <p>
                <input class="text email" type="password" name="password" placeholder="Password"
                        value="{{ old('password') }}" required>
            </p>
            <p><input type="submit" value="Log in"></p>
            <p>Don't have an Account? <a href="register"> Sign up now!</a></p>
        </form>


        {{-- <a href="">Sign up</a> --}}

    </div>
</body>

                    
</html>
