@extends('layouts.master')
@section('css')
@stop
@section('sidebar-up')
    <div class="container" style="margin: 50px 0 50px 0">
        <table class="table table-condensed">
            <tr class="info">
                <td>@lang('detail.producer')</td>
                <td>{{ $request->book_name }}</td>
            </tr>
            <tr class="active">
                <td>@lang('detail.author')</td>
                <td>{{ $request->author_name }}</td>
            </tr>
            <tr class="info">
                <td>@lang('detail.category')</td>
                <td>{{ $request->date_published }}</td>
            </tr>
            <tr class="active">
                <td>@lang('detail.publish-date')</td>
                <td>{{ $request->description }}</td>
            </tr>
        </table>
        {!! Form::open([
                        'url' => '/cancelRequest',
                        'method' => 'post',
                    ]) !!}
        <input type="hidden" class="form-control" name="requestid" value="{{ $request->id }}">
        <button href="{{ action('Admin\RequestManagerController@cancelRequest') }}" class="btn icon-btn btn-danger cancel_request">
                                        <span class="glyphicon btn-glyphicon glyphicon-trash img-circle text-danger" data-requestid="{{ $request->id }}">
                                        </span>Hủy yêu cầu</button>
        <a name="approve" href="{{ route('request-approve.show',  $request->id) }}" class="btn btn-primary pull-right">Chấp nhận yêu cầu</a>
        {!! Form::close() !!}
    </div>
@stop
@section('script')
    <script src='{{ asset('/js/add-request.js') }}'></script>
@stop