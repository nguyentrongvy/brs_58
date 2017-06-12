@extends('front.layouts.master')

@section('css')
    {{ Html::style('/front/css/updateProfile.css') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12" id="title_update">
            <div class="alert alert-success" role="alert">
                <div class="title">{{ trans('lang.user.update-profile') }}</div>
            </div>
        </div>
        <div class="col-md-6" id="form_update">
            {{ Form::open(['method' => 'POST', 'route' => ['post.profile.user', Auth::user()->id ], 'enctype' => 'multipart/form-data']) }}

            <div class="form-group">
                {{ Form::label('username', trans('lang.register.register-name'))  }}
                {{ Form::text('name', old('name',  Auth::user()->name), ['class' => 'form-control input'])  }}
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                {{ Form::label('Email', trans('lang.register.register-email'))  }}
                {{ Form::email('email', old('email', Auth::user()->email), ['class' => 'form-control input', 'disabled'])  }}
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                {{ Form::label('gender', trans('lang.register.register-gender'))  }}
                {{ Form::select('gender', ['0' => '', 'Nam' => 'Nam', 'Nữ' => 'Nữ'], null, ['class' => 'form-control input']) }}
                @if ($errors->has('gender'))
                    <span class="help-block">
                        <strong>{{ $errors->first('gender') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group ">
                {{ Form::label('birthday'), trans('lang.register.register-birthday'), ['class' => 'control-label col-sm-2 requiredField'] }}
                {{ Form::date('birthday', old('birthday', Auth::user()->birthday), ['class' => 'form-control input']) }}
                @if ($errors->has('birthday'))
                    <span class="help-block">
                        <strong>{{ $errors->first('birthday') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                {{ Form::label('image', trans('lang.register.register-image'))  }}
                {!! Form::file('image', ['class' => 'image']) !!}
                @if ($errors->has('image'))
                    <span class="help-block">
                        <strong>{{ $errors->first('image') }}</strong>
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
@endsection

