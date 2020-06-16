<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Email</title>
</head>
<body>
    <h3>User Email</h3>
    <h5>From: {{ $details['name'] }}</h5>
    <h5>Email: {{ $details['email'] }}</h5>
    <hr><br>
    <h3>Message</h3><hr>
    <p>{{ $details['message'] }}</p>
    
</body>
</html>