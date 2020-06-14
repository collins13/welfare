<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Email</title>
    <style>
        .container{
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
<h3>Welcome {{ $info['name']}}, here are your login details</h3>
<p>Email: {{ $info['email'] }}</p>
<p>password: {{ $info['password'] }}</p>
<a href="{{ url('login') }}">Login here</a>
    </div>
</body>
</html>