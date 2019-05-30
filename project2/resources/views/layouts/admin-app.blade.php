<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>   

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
    <script src="{{ asset('js/plugins.js') }}" defer></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>
    <script src="{{ asset('js/jquery.min.js') }}" defer></script>
    <script src="{{ asset('js/boostrap.min.js') }}" defer></script>
    <script src="{{ asset('js/boostrap.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script><!--Jquery-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script><!--boostrap-->
    
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/color/color.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.transitions.css') }}" rel="stylesheet">

    <!-- Ioncion -->
    <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">

    <!-- Fontawsome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-grid.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-reboot.css') }}" rel="stylesheet">
    <!-- Boostrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <style type="text/css">
    body{
        background-color: #212529;
    }

    #wrapper {
        position: fixed;
        left: 0;
        -webkit-transition: all 0.5s ease;
        -moz-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        transition: all 0.5s ease;
    }

    #wrapper.toggled {
        left: -100%;
    }
    #wrapper.resize-wrapper{
        left: -100%;
    }

    #sidebar-wrapper {
        z-index: 1000;
        position: fixed;
        /*right: 250px;*/
        width: 0;
        height: 100%;
        margin-right: -250px;
        overflow-y: auto;
        -webkit-transition: all 0.5s ease;
        -moz-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        transition: all 0.5s ease;
    }

    /* #wrapper.toggled #sidebar-wrapper {
    left: -32rem;
    }*/

    #page-content-wrapper {
        width: 100%;
        position: absolute;
        padding: 15px;
    }

    #wrapper.toggled #page-content-wrapper {
        position: absolute;
        margin-right: 0px;
    }
    /* Sidebar Styles */

    .sidebar-nav {
        position: fixed;
        margin: 0;
        padding: 0;
        list-style: none;
        background-color: #242424;
        display: block;
        height: 100vh;
    }

    .sidebar-nav li {
        text-indent: 20px;
        line-height: 40px;
    }

    .sidebar-nav li a {
        display: block;
        text-decoration: none;
        color: #999999;
    }

    .sidebar-nav li a:hover {
        text-decoration: none;
        color: #fff;
        background: rgba(255, 255, 255, 0.2);
    }

    .sidebar-nav li a:active, .sidebar-nav li a:focus {
        text-decoration: none;
    }

    .sidebar-nav>.sidebar-brand {
        height: 65px;
        font-size: 18px;
        line-height: 60px;
    }

    .sidebar-nav>.sidebar-brand a {
        color: #999999;
    }

    .sidebar-nav>.sidebar-brand a:hover {
        color: #fff;
        background: none;
    }

    @media only screen and (min-width: 768px) {
        #wrapper {            
         left: -100%;
        }
        #wrapper.toggled {
         left: 0;
        }
        #sidebar-wrapper {
         width: 0;
        }
        #wrapper.toggled #sidebar-wrapper {
         width: 250px;
        }
        #page-content-wrapper {
         padding: 20px;
         position: relative;
        }
        #wrapper.toggled #page-content-wrapper {
         position: relative;
         margin-right: 0;
        }
        #content.toggled-con{
            -ms-flex: 0 0 84%;
            flex: 0 0 84%;
            max-width: 84%;
            transition: all 0.5s ease;
        }
        #content{
            -ms-flex: 0 0 100%;
            flex: 0 0 100%;
            max-width: 100%;
            transition: all 0.5s ease;
        }
    }

    .content{
        width: 100%;
        position: absolute;
        right: 0;
        transition: all 0.5s ease;
    }
    /*#content.toggled-con{
        -ms-flex: 0 0 100%;
        flex: 0 0 100%;
        max-width: 100%;
        transition: all 0.5s ease 200ms;
    }
    #content{
        -ms-flex: 0 0 84%;
        flex: 0 0 84%;
        max-width: 84%;
        transition: all 0.5s ease 200ms;
    }*/


    </style>
</head>
<body>
    <div class="fluid-container">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <a href="#menu-toggle" id="menu-toggle" class="navbar-brand"><span class="navbar-toggler-icon"></span></a>             
            <div class="col-2">
                <a class="navbar-brand" href="#">Admin</a>
            </div>
            
            <div class="col-8 col-md-10 text-right">
                @guest
                    <div class="px-0 px-md-3 pl-1 py-3">
                        <a href="#" class="account-top">log in</a>
                        <a href="#" class="account-top">register</a>
                    </div>
                @else   
                    <div class="account-wrap">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><strong>{{ Auth::user()->name }}</strong>  <span class="caret"></span>
                        </a>
                        <ul>
                            <li><a href="{{route('myaccount')}}"><i class="fas fa-user"></i>My Account</a></li>
                            <li><a href="{{route('myaccount',['#my_booking'])}}"><i class="fas fa-ticket-alt"></i>My Booking</a></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form></a></li>    
                        </ul>
                    </div>
                        
                @endguest   
            </div>
        </nav>
    </div>
    <div class="fluid-container">
        <div id="wrapper" class="toggled">
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav col-12 col-md-3 col-lg-2">
                    <li class="sidebar-brand"> <a href="{{route('admin')}}">Home</a> </li>
                    <li> <a href="{{route('book-off')}}">Booking</a> </li>
                    <li> <a href="#">Check-in</a> </li>
                    <li> <a href="#">Check-out</a> </li>
                    <li> <a href="#">Revenue Statistics</a> </li>
                    <li> <a href="#">Booking rate</a> </li>
                    <li> <a href="{{route('manager-room')}}">Manager room</a> </li>
                </ul>
            </div>
        </div>

        <div class="container content toggled-con" id="content"> @yield('content') </div>
    </div>
    

    
    <div class="scroll-to-top" style="background-image: url('img/arrow-up.svg');"></div>
    
<script>
    $(function(){
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
            $("#content").toggleClass("toggled-con");
        });

        $(window).resize(function(e) {
            if($(window).width()<=768){
                $("#wrapper").toggleClass("toggled");
            }else{
                $("#wrapper").toggleClass("toggled");
            }
        });
    });

</script>
</body>
</html>