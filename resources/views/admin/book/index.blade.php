@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <!-- Begin: life time stats -->
            <div class="portlet light portlet-fit portlet-datatable bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-layers font-dark"></i>
                        <span class="caption-subject font-dark sbold uppercase">{{ trans('lang.book.all-book') }}</span>
                    </div>
                    <div class="actions">
                        <div class="btn-group btn-group-devided">
                            <a class="btn btn-transparent btn-success btn-circle btn-sm active" href=""><i class="fa fa-plus"></i> {{ trans('lang.book.submit') }}</a>
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-container">
                        <table class="table table-striped table-bordered table-hover table-checkable vertical-middle" id="datatable_ajax">
                            <thead>
                                <tr role="row" class="heading">
                                    <th width="1%">
                                        {{ Form::checkbox('checkbox', old('checkbox'), ['class' => 'group-checkable']) }}
                                    </th>
                                    <th width="5%">
                                        #
                                    </th>
                                    <th width="40%">{{ trans('lang.book.title') }}</th>
                                    <th width="10%">{{ trans('lang.book.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($books as $book)
                                    <tr role="row" class="odd">
                                        <td>
                                            <div class="checker"><span><input type="checkbox" name="id[]" value="1"></span></div>
                                        </td>
                                        <td class="sorting_1">{{ $book->id }}</td>
                                        <td>{{ $book->name }}</td>
                                        <td>
                                            <a href="{{ route('book.edit', $book->id) }}" class="btn btn-outline green btn-sm"><i class="icon-pencil"></i></a>
                                            {{ Form::open(['method' => 'DELETE', 'route' => ['book.destroy', $book->id]]) }}
                                                <button id="delete_book" data-confirm="{{ trans('lang.book.confirm-delete') }}" class="tipS button redB"><span class="glyphicon glyphicon-trash"></span></button>
                                            {{ Form::close() }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- End: life time stats -->
        </div>
    </div>
@endsection

@section('js')
    {{ Html::script('/admin/js-nestable/jquery-book.js') }}
@endsection
