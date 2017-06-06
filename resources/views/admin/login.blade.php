<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="/auth/css/css.css" rel="stylesheet" type="text/css">
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
                        {{ Form::hidden('_token', 'csrf_token()')  }}
                        {{ Form::email('email', old('email'), ['placeholder' => 'username', 'required'])  }}
                        {{ Form::password('password', ['placeholder' => 'password', 'required'])  }}
                        <button type="submit">{{ trans('lang.admin.button-login') }}</button>
                    {{ Form::close()  }}
                </div>
            </div>
        </div>
    </div>
</body>
