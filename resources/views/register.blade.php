<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=., initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Register page</h1>

    <form action="{{url("register-user")}}" method="post">
        @csrf

        <label for="email">Email</label>
        <input type="email" name="email" id="">
        <label for="password">Password</label>
        <input type="password" name="password" id="">
        <input type="submit" value="Submit">
    </form>
</body>
</html>