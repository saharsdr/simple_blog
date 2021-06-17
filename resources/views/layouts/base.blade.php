<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{url('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">


    <title>
        @yield('page_title')
    </title>
</head>
<body>
    
    @yield('content')

    <script src="{{url('bootstrap/js/jquery.min.js')}}"></script>
    <script src="{{url('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('bootstrap/js/bootstrap.min.js')}}"></script>
</body>
</html>