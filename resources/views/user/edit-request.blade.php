@extends('layouts.master')
@section('css')
@stop
@section('sidebar-up')
    <div class="container" style="margin: 50px">
        <div class="col-md-5">
            <div class="form-area">
                {!! Form::open([
                        'url' => '/editRequest',
                        'method' => 'post',
                    ]) !!}
                <br style="clear:both">
                <h3 style="margin-bottom: 25px; text-align: center;">Gửi yêu cầu thêm sách</h3>
                <div class="form-group">
                    <input type="hidden" class="form-control"  name="requestid" placeholder="Tên sách"  value="{{ $request->id }}" >
                    <input type="text" class="form-control" id="name" name="name" placeholder="Tên sách"  value="{{ $request->book_name }}" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="author" name="author" placeholder="Tác giả" value="{{ $request->author_name }}" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="date_published" name="date_published"
                           placeholder="Ngày xuất bản" value="{{ $request->date_published }}" required>
                </div>
                <div class="form-group">
                         <textarea class="form-control" type="textarea" id="description"
                                   placeholder="description" maxlength="140" rows="7"> {{ $request->description }}</textarea>

                </div>
                <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right">Sửa yêu cầu</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
@section('script')
    <script src='{{ asset('/js/add-request.js') }}'></script>
@stop