<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin register</title>
</head>
<body>
@if (session('success'))
    <h3 style="color: #28d335;">{{ session('success') }}</h3>
@endif
<form action="{{ route('admin.register') }}" method="post">
    @csrf
    <input type="text" name="name" placeholder="name"><br>
    <input type="email" name="email" placeholder="email"><br>
    <input type="password" name="password" placeholder="*****"><br>
    <button type="submit">Admin Register</button>
</form>

</body>
</html>
