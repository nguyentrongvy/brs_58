@extends('front.layouts.master')

@section('content')
    <div class="row" style="margin-top:10px;margin-left: 10px;">
        <div class="col-md-6">
            <div class="alert alert-success" role="alert">
                <span class="glyphicon glyphicon-home" style="margin-right: 10px;"></span> > Login
            </div>
        </div>
    </div>
    <div class="row" style="margin-top: 10px;">
        <div class="col-md-12">
            <div class="col-md-6">
                @if (session('message'))
                    <div class="alert alert-danger">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="col-md-6" style="margin-left: 25px;">
            {{ Form::open(['method' => 'post', 'route' => 'post.login.front'])  }}
                <div class="form-group">
                    {{ Form::label('username', trans('lang.user.form-email'), ['class' => ''])  }}
                    {{ Form::text('email', old('email'), ['class' => 'form-control'])  }}
                    <span class="help-block"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    {{ Form::label('username', trans('lang.user.form-password'), ['class' => ''])  }}
                    {{ Form::password('password', ['class' => 'form-control'])  }}
                    <span class="help-block"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                {{ Form::submit(trans('lang.user.form-login'), ['class' => 'btn btn-default']) }}
            {{ Form::close()  }}
        </div>
    </div>
</div>
@endsection
