<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    {{ Html::style('auth/css/css.css') }}
</head>
<body>
    <div class="login-page">
        <div class="form">
            <div class="login-page">
                <div class="form">
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    {{ Form::open(['class' => 'login-form'])  }}
                        {{ Form::hidden('role')  }}
                        {{ Form::email('email', old('email'), ['placeholder' => 'username', 'required'])  }}
                        {{ Form::password('password', ['placeholder' => 'password', 'required'])  }}
                        {{ Form::submit(trans('lang.admin.button-login'), ['class' => 'btn btn-success']) }}
                    {{ Form::close()  }}
                </div>
            </div>
        </div>
    </div>
</body>
