<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <h4>User Home Page</h4>
    @if(!auth()->check())
    <a href="{{ route('user.login') }}">Login</a><br>
    <a href="{{ route('user.register') }}">Register</a>
    @else
    <a href="{{ route('user.logout') }}">Logout</a>
    @endif
</body>
</html>
