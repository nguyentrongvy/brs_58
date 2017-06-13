@extends('admin.layouts.master')

@section('css')
    {{ Html::style('/pageAdmin/core/third_party/jquery-nestable/jquery.nestable.css') }}
    {{ Html::style('/pageAdmin/css/menu-nestable.css') }}
    {{ Html::style('/admin/css/category.css') }}
@endsection

@section('content')
    <textarea name="menu_nodes1" id="nestable-output1" class="form-control hidden"></textarea>

    <div class="row">
        <div class="col-md-4">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-link font-dark"></i>
                        <span class="caption-subject font-dark sbold uppercase">{{ trans('lang.category.add-category') }}</span>
                    </div>
                    <div class="tools">
                        <a href="" class="collapse" data-original-title="" title=""> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <form id="category" method="post">
                        <div class="box-links-for-menu">
                            <div id="category" class="the-box">
                                <div class="form-group">
                                {{ Form::label('node-title', trans('lang.category.title')) }}
                                    {{ Form::text('title', old('title'), ['class' => 'form-control the-object-title', 'id' => 'node-title']) }}
                                </div>
                                <div class="form-group">
                                {{ Form::label('node-url', trans('lang.category.slug')) }}
                                    {{ Form::text('slug', old('slug'), ['class' => 'form-control the-object-slug', 'id' => 'node-slug']) }}
                                </div>
                                <div class="text-right">
                                    <div class="btn-group btn-group-devided">
                                        <a href="#" title="" class="btn-add-to-menu btn btn-success btn-sm btn-circle btn-transparent active"><span class="text"><i class="fa fa-plus"></i>{{ trans('lang.category.add_to_menu') }}</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-bars font-dark"></i>
                        <span class="caption-subject font-dark sbold uppercase">{{ trans('lang.category.menu_structure') }}</span>
                    </div>
                    <div>
                        {{ Form::open(['class' => 'js-validate-form form-save-menu']) }}
                        {{ Form::hidden('deleted_nodes') }}
                        <textarea name="menu_nodes" id="nestable-output" class="form-control hidden"></textarea>
                        <div class="btn-group btn-group-devided submit-category">
                            {{ Form::submit(trans('lang.category.button'), ['class' => 'btn btn-transparent btn-success btn-circle btn-sm active ']) }}
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="dd nestable-menu" id="nestable" data-depth="0">
                        {!! $nestableMenuSrc or '' !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    {{ Html::script('/pageAdmin/core/third_party/jquery-nestable/jquery.nestable.js') }}
    {{ Html::script('/admin/js/my-javascipt-nestable.js') }}
    {{ Html::script('/admin/js-nestable/load-jquery-category.js') }}
    {{ Html::script('/admin/js/jquery.validate.js') }}
    {{ Html::script('/admin/js-nestable/my-jquery-slug.js') }}
    {{ Html::script('/admin/js/jquery-nestable.js') }}
@endsection

