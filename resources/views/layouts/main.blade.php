<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">
    <title>@yield('title')</title>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.js"></script
</head>
<body>
<header>
    {{--@include('../blocks/header')--}}
</header>
<section>
    @yield('content')
</section>
<footer>
    <div class="box-footer">
        <p>CopyRight@2018 by Skipperhoa</p>
    </div>
</footer>
</body>
</html>
