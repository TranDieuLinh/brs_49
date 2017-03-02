@extends('layouts.master')
@section('sidebar-up')
    <div class="container" style="margin-top: 40px">
        <div class="row">
            <div class="span5">
                <table class="table table-striped table-condensed">
                    <thead>
                    <tr>
                        <th>Tên sách</th>
                        <th>Tác giả</th>
                        <th>Ngày tạo </th>
                        <th>Trạng thái</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($requests as $request)
                        <tr class="row-item">
                            <td>{{ $request->book_name }}</td>
                            <td>{{ $request->author_name }}</td>
                            <td>{{ $request->created_at }}</td>
                            @if( $request->status == 0)
                                <td><span class="label label-warning">Đợi xử lý</span></td>
                            @elseif( $request->status == 1)
                                <td><span class="label label-success">Đã xử lý</span></td>
                            @elseif( $request->status == 2)
                                <td><span class="label label-danger">Bị từ chối</span></td>
                            @elseif( $request->status == 3)
                                <td><span class="label label-info">Đang xử lý</span></td>
                            @endif
                            @if( $request->status == 0 || $request->status == 3)
                                <td>
                                    <a class="btn icon-btn btn-info" href="{{ route('request-manager.show',  $request->id) }}">
                                        <span class="glyphicon btn-glyphicon glyphicon-share img-circle text-info"></span>Xem</a>
                                </td>
                            @else
                                <td><button class="btn icon-btn btn-danger cancel_request">
                                        <span class="glyphicon btn-glyphicon glyphicon-trash img-circle text-danger" data-requestid="{{ $request->id }}">
                                        </span>Xóa</button>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script src='{{ asset('/js/request-manager.js') }}'></script>
@stop