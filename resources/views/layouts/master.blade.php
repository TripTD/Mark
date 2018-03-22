<!doctype html>
<html>
<head>
    <title>@yield('head')</title>
</head>
<body>
<br>
@include('partials.translate')
<br><br>
<div class="container">
    @yield('display-content')
</div>
<br>
@yield('links')
<br>
<br>
@yield('footer')
<br>
<br>
</body>
</html>