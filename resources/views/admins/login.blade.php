<!doctype html>
<html>
<head>
    <title>Log In</title>
</head>
<body>
@include('partials.translate')
<form action="{{ route('Admins.postLogin') }}" method="post">
    {{ csrf_field() }}
    <div class="container" style="display: inline-flex;">
        <strong>Username</strong> <input type="text" name="username" value =""/><br/>
        <strong>Password</strong> <input type="password" name="password" value = ""/><br/>
        <input type="submit" name="submit" value="Submit">
    </div>
</form>
<br><br>
    <a href="index">Go to Index!</a>
</body>
</html>