<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    {{ Html::style('/bower/bootstrap/dist/css/bootstrap.css')  }}
    {{ Html::style('/auth/css/style.css')  }}
    @yield('css')
</head>
<body>
<section id="slide">
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
                <ul class="nav navbar-nav navbar-right">
                    @if(!Auth::user())
                        <li><a href="{{ route('register')  }}">{{ trans('lang.register.register-button')  }}</a></li>
                        <li><a href="{{ route('get.login.front')  }}">{{ trans('lang.user.user') }}</a></li>
                    @endif

                    @if(Auth::user())
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} {{ Auth::user()->image ? Auth::user()->image : '' }} <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">{{ trans('lang.user.user-profile') }}</a></li>
                                <li><a href="">{{ trans('lang.user.logout') }}</a></li>
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
            <img src="{{asset('auth/image/slide5_web.jpg')}}" id="image_slide">
        </div>
    </div>
</div>

<section>
    <div class="container">
        @yield('content')
    </div>
</section>

{{ Html::script('/bower/jquery/dist/jquery.js')  }}
{{ Html::script('/bower/bootstrap/dist/js/bootstrap.js')  }}
@yield('js')
</body>
</html>
