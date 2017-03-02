@extends('layouts.master')
@section('sidebar-up')
    <div class="container" style="margin-top: 40px">
        <div class="row">
            <div class="span5">
                <table class="table table-striped table-condensed">
                    <thead>
                    <tr>
                        <th>Ảnh</th>
                        <th>Tên sách</th>
                        <th>Tác giả</th>
                        <th>Thể loại</th>
                        <th>Nhà xuất bản</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($books as $book)
                        <tr class="row-item">
                            <td><img style="width: 20px; height: 30px" src="{{ $book->image }}" title="{{ $book->title }}"/></td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author()->get()->first()->author_name }}</td>
                            <td>{{ $book->category()->get()->first()->name }}</td>
                            <td>{{ $book->publisher}}</td>
                            <td><a class="btn icon-btn btn-danger delete_request" href="#">
                                        <span class="glyphicon btn-glyphicon glyphicon-trash img-circle text-danger">
                                        </span>Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script src='{{ asset('/js/request.js') }}'></script>
@stop