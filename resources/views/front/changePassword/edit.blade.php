@extends('front.layouts.master')

@section('content')
    <div class="row" id="message">
        <div class="col-md-6">
            @if (session('message'))
                <div class="alert alert-danger">
                    {{ session('message') }}
                </div>
            @endif
        </div>
    </div>
    {{ Form::open() }}
        <div class="row" id="title_change_p">
            <div class="row" class="title">
                <div class="col-md-12">
                    <div class="alert alert-success" role="alert">
                        {{ trans('lang.user.change-password') }}
                    </div>
                </div>
            </div>

        	<div class="form-group">
                {{ Form::label('password_old', trans('lang.register.register-password'))  }}
                {{ Form::password('password_old', ['class' => 'form-control input'])  }}
                @if (session('error'))
                    <span class="help-block">
                        <strong>{{ session('error') }}</strong>
                    </span>
                @endif
            </div>

        	<div class="form-group">
                {{ Form::label('password', trans('lang.register.register-password'))  }}
                {{ Form::password('password', ['class' => 'form-control input'])  }}
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                {{ Form::label('password_confirm', trans('lang.register.register-confirm-password'))  }}
                {{ Form::password('password_confirmation', ['class' => 'form-control input'])  }}
            </div>

            <div class="control-group">
                <div class="controls">
                    {{ Form::submit(trans('lang.register.register-button'), ['class' => 'btn btn-success']) }}
                </div>
            </div>
        </div>
    {{ Form::close() }}
@endsection
