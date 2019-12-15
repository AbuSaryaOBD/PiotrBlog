<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">

    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="d-flex flex-column flex-md-row align-items-center p-2 px-md-4">
            <h5 class="my-0 mr-md-auto font-weight-bold">Laravel Blog</h5>
            <nav class="my-2 my-md-0">
                <a class="p-1 text-dark" href="{{ route('home1') }}">Home</a><span class="text-center">.</span>
                <a class="p-1 text-dark" href="{{ route('contact') }}">Contact</a><span class="text-center">.</span>
                <a class="p-1 text-dark" href="{{ route('posts.index') }}">Blog</a><span class="text-center">.</span>
                <a class="p-1 text-dark" href="{{ route('posts.create') }}">Add Blog Post</a>
            </nav>
        </div>
        <hr class="mt-1">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif (session()->has('danger'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session()->get('danger') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif (session()->has('warning'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session()->get('warning') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif (session()->has('info'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                {{ session()->get('info') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @yield('content')
    </div>
    {{-- <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('js/popper.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script> --}}
</body>
</html>