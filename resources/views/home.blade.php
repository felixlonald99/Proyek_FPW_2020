<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="margin: 0px">
    @include('includes.header')
    <div>
    @yield('content')
    </div>
    @include('includes.footer')
</body>
</html>
