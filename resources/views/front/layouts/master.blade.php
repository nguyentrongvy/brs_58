<!DOCTYPE html>
<html>
<head>
    <title></title>
    {{--bower--}}
    <link rel="stylesheet" type="text/css" href="/bower/bootstrap/dist/css/bootstrap.css">
    {{--style--}}
    <link rel="stylesheet" type="text/css" href="/auth/css/style.css">
</head>
<body>
<section style="margin-bottom: 10px;margin-top: 10px;">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img src="{{asset('auth/image/logo.png')}}">
            </div>
            <div class="col-md-9">

            </div>
        </div>
        <div class="row">

        </div>
    </div>
</section>

<section>
    <nav class="navbar navbar-default">
        <div class="container menu-header">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse menu" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                    <li><a href="#">Link</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    @if(!Auth::user())
                        <li><a href="{{ route('register')  }}">Register</a></li>
                        <li><a href="{{ route('get.login.front')  }}">Login</a></li>
                    @endif

                    @if(Auth::user())
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} {{ Auth::user()->image ? Auth::user()->image : '' }} <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Trang cá nhân</a></li>
                                <li><a href="#">Đăng xuất</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</section>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <img src="{{asset('auth/image/slide5_web.jpg')}}" style="width: 100%;">
        </div>
    </div>
</div>

<section>
    <div class="container">
        @yield('content')
    </div>
</section>

<script src="/bower/jquery/dist/jquery.js"></script>
<script src="/bower/bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>
