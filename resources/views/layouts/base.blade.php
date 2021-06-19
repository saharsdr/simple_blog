<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{url('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('css/base.css')}}" rel="stylesheet" type="text/css">
    @yield('links')

    

    <title>
        @yield('page_title')
    </title>
</head>
<body>
    <div class="container-fluid">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            
            <div class="d-flex justify-content-between collapse navbar-collapse" >
              <div  class="d-flex ">
                <a class="navbar-brand mx-4" href="#">انجمن علمی کامپیوتر</a>
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                    <a class="nav-link" href="#">خانه</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">مطالب</a>
                    </li>
                </ul>
              </div>
              <ul class="navbar-nav  mt-2 mt-lg-0 mx-4">
                  @auth
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            @php
                               echo auth()->user()->name_first." ".auth()->user()->name_last;
                            @endphp
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">خروج</a>
                    </li>
                  @endauth
                  @guest
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">ورود</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">ثبت نام</a>
                    </li>
                  @endguest
                    
                
                
                
              </ul>
            </div>
        </nav>

        
        @yield('content')

    </div>
    <script src="{{url('bootstrap/js/jquery.min.js')}}"></script>
    <script src="{{url('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('bootstrap/js/bootstrap.min.js')}}"></script>
</body>
</html>