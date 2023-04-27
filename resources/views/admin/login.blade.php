<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
</head>
<body>
@if (session('error'))
    <h3 style="color: red;">{{ session('error') }}</h3>
@endif
<form action="{{ route('admin.login') }}" method="post">
    @csrf
    <input type="email" name="email" placeholder="email"><br>
    <input type="password" name="password" placeholder="*****"><br>
    <button type="submit">Admin Login</button>
</form>
</body>
</html>
