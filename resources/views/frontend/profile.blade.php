<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User dashboard</title>
</head>
<body>
<h4>User Dashboard Page</h4>
<h4>Name: {{ auth()->user()->name }}</h4>
<h4>Email: </h4>
<a href="{{ route('user.logout') }}">Logout</a><br>
</body>
</html>
