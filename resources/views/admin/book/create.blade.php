@extends('admin.layouts.master')

@section('css')
    {{ Html::style('/admin/css/create-book.css') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-horizontal form-row-seperated">
                        <div class="portlet">
	                       <div class="portlet-body">
	                           <div class="tabbable-bordered">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#tab_general" data-toggle="tab"> {{ trans('lang.book.general') }} </a>
                                        </li>
                                    </ul>
	                                <div class="tab-content">
                                        <div class="tab-pane active" id="tab_general">
                                            {{ Form::open(['route' => 'book.store', 'class' => 'js-validate-form', 'enctype' => 'multipart/form-data']) }}
                                                <div class="form-body">
                                                    <div class="form-group">
                                                        {{ Form::label('name', trans('lang.book.name'), ['class' => 'col-md-2 control-label']) }}
                                                        <div class="col-md-10">
                                                            {{ Form::text('name', old('name'), ['class' => 'form-control the-object-title']) }}
                                                            @if ($errors->has('name'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('name') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        {{ Form::label('slug', trans('lang.book.slug'), ['class' => 'col-md-2 control-label']) }}
                                                        <div class="col-md-10">
                                                            {{ Form::text('slug', old('slug'), ['class' => 'form-control the-object-slug']) }}
                                                            @if ($errors->has('slug'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('slug') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        {{ Form::label('image', trans('lang.book.image'), ['class' => 'col-md-2 control-label']) }}
                                                        <div class="col-md-10">
                                                            {{ Form::file('image')}}
                                                            @if ($errors->has('image'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('image') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        {{ Form::label('author', trans('lang.book.author'), ['class' => 'col-md-2 control-label']) }}
                                                        <div class="col-md-10">
                                                            {{ Form::text('author', old('author'), ['class' => 'form-control the-object-title']) }}
                                                            @if ($errors->has('author'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('author') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        {{ Form::label('number', trans('lang.book.number_of_page'), ['class' => 'col-md-2 control-label']) }}
                                                        <div class="col-md-10">
                                                            {{ Form::number('number_of_page', old('number_of_page')) }}
                                                            @if ($errors->has('number_of_page'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('number_of_page') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        {{ Form::label('publish_date', trans('lang.book.date'), ['class' => 'col-md-2 control-label']) }}
                                                        <div class="col-md-10">
                                                            {{ Form::date('publish_date', old('publish_date')) }}
                                                            @if ($errors->has('publish_date'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('publish_date') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        {{ Form::label('title', trans('lang.book.title'), ['class' => 'col-md-2 control-label']) }}
                                                        <div class="col-md-10">
                                                            {{ Form::text('title', old('title'), ['class' => 'form-control the-object-title']) }}
                                                            @if ($errors->has('title'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('title') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        {{ Form::label('description', trans('lang.book.description'), ['class' => 'col-md-2 control-label']) }}
                                                        <div class="col-md-10">
                                                            {!! Form::textarea('description' , old('description'), ['class' => 'form-control']) !!}
                                                            @if ($errors->has('description'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('description') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        {{ Form::label('category', trans('lang.book.category'), ['class' => 'col-md-2 control-label']) }}
                                                        <div class="col-md-10">
                                                            <div class="form-control height-auto">
                                                                <div class="scroller"
                                                                     data-always-visible="1" data-rail-visible1="1">
                                                                    <ul class="list-unstyled">
                                                                        @foreach($categories as $row)
                                                                            <li>
                                                                                <label><input type="checkbox" name="category_ids[]" value="{{ $row->id }}">
                                                                                {{ $row->name }}
                                                                                </label>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <span class="help-block"> {{ trans('lang.category.select-category')  }} </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{ Form::submit( trans('lang.book-create.submit'), ['class' => 'submit'] ) }}
                                            {{ Form::close() }}
                                        </div>
                                    </div>
                               </div>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    {{ Html::script('/admin/js-nestable/my-jquery-slug.js') }}
@endsection

