<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="">

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">


    <title>Document</title>
</head>
<body>
    <div class="container">
        <ul class="list-group list-group-horizontal list-unstyled justify-content-center m-3">
            <li class="list-group-item"><a href="{{ route('home1') }}">Home</a></li>
            <li class="list-group-item"><a href="{{ route('contact') }}">Contact</a></li>
            <li class="list-group-item"><a href="{{ route('posts.index') }}">Blog</a></li>
            <li class="list-group-item"><a href="{{ route('posts.create') }}">Add Blog Post</a></li>
        </ul>
        <hr>
        @yield('content')
    <div class="container">

    <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('js/popper.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>