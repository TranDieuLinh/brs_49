@extends('layouts.master')
@section('sidebar-up')
    <div class="container" style="margin-top: 40px">
        <div class="row">
            <div class="span5">
                <table class="table table-striped table-condensed">
                    <thead>
                    <tr>
                        <th>Tên người dùng</th>
                        <th>Email</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr class="row-item">
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
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