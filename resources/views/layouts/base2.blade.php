<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{url('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('css/base.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('fontawesome/css/all.css')}}" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font@v29.1.0/dist/font-face.css" rel="stylesheet" type="text/css" />
    

    @yield('links')

    

    <title>
        @yield('page_title')
    </title>
</head>
<body>
    
    <div class="container-fluid">

                  
        <nav class="navbar navbar-light bg-charcoal p-0">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex justify-content-center flex-row w-100">
               
                <li class="nav-item">
                  <a class="nav-link active p-2 text-white" aria-current="page" href="{{route('home')}}">بازگشت به خانه<i class="fa fa-home p-3" aria-hidden="true"></i></a>
                </li>
                
            </ul>
        </nav>         
                
                
           
        
        @yield('content')

    </div>
    <script src="{{url('bootstrap/js/jquery.min.js')}}"></script>
    <script src="{{url('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{url('js/script.js')}}"></script>
</body>
</html>