@extends('front.layouts.master')

@section('css')
    {{ Html::style('/front/css/bootstrao-iso.css') }}
    {{ Html::style('/front/css/bootstrap-datepicker3.css') }}
    {{ Html::style('/front/css/register.css') }}
@endsection

@section('content')
    <div class="container">
        <div class="row title_register">
            <div class="col-md-12">
                <div class="alert alert-success" role="alert">
                    <span class="glyphicon glyphicon-home"></span> >{{ trans('lang.register.register-button') }}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 register_form">
                {{ Form::open(['method' => 'POST', 'route' => 'register']) }}

                    <div class="form-group">
                        {{ Form::label('username', trans('lang.register.register-name'))  }}
                        {{ Form::text('name', old('name'), ['class' => 'form-control input'])  }}
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        {{ Form::label('Email', trans('lang.register.register-email'))  }}
                        {{ Form::text('email', old('email'), ['class' => 'form-control input'])  }}
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
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

                    <div class="form-group">
                        {{ Form::label('gender', trans('lang.register.register-gender'))  }}
                        {{ Form::select('gender', ['0' => '', 'Male' => trans('lang.gender.male'), 'Female' => trans('lang.gender.female'), null, ['class' => 'form-control input']) }}
                        @if ($errors->has('gender'))
                            <span class="help-block">
                                <strong>{{ $errors->first('gender') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group ">
                        {{ Form::label('birthday'), trans('lang.register.register-birthday'), ['class' => 'control-label col-sm-2 requiredField'] }}
                        {{ Form::text('birthday', old('birthday'), ['class' => 'form-control input', 'date' => 'date', 'placeholder' => 'MM/DD/YYYY']) }}
                        @if ($errors->has('birthday'))
                            <span class="help-block">
                                <strong>{{ $errors->first('birthday') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="control-group">
                        <!-- Button -->
                        <div class="controls">
                            {{ Form::submit(trans('lang.register.register-button'), ['class' => 'btn btn-success']) }}
                        </div>
                    </div>

                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection

@section('js')
    {{ Html::script('/front/js/bootstrap-datepicker.min.js') }}
    {{ Html::script('/front/js/formden.js') }}
    {{ Html::script('/front/js/datepicker.js') }}
@endsection
