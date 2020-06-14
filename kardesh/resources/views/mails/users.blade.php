<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Email</title>
</head>
<body>
    <h3>Welcome To kardesh bernea</h3>
    <h5>Hello {{ $info['name'] }}, here are your login details</h5>
    <p>Email: {{ $info['email'] }}</p>
    <p>Password: {{ $info['password'] }}</p>
    <a href="{{ url('login') }}">Login here</a>
</body>
</html>