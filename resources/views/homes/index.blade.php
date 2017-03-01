@extends('layouts.master')
@section('css')
    <link href='{{ asset('/Bootstrap/css/prettyPhoto.css') }}' rel="stylesheet">
    <link href='{{ asset('/Bootstrap/css/price-range.css') }}' rel="stylesheet">
    <link href='{{ asset('/Bootstrap/css/animate.css') }}' rel="stylesheet">
    <link href='{{ asset('/Bootstrap/css/main.css') }}' rel="stylesheet">
    <link href='{{ asset('/Bootstrap/css/responsive.css') }}' rel="stylesheet">
    <link type="text/css" href='{{ asset('Bootstrap/css/sweet-alert.css') }}' rel="stylesheet">
@stop
@section('header')
@stop
@section('sidebar-up')
    <hr color="red">
@stop
@section('sidebar-left')
    @include ('layouts.sidebar')
@stop
@section('sidebar-right')
    <hr>
    <div class="features_items"><!--features_items-->
        @if($title != null)
            <h2 class="title text-center">{{ $title }}</h2>
        @endif
        @if(count($books )== 0)
            <div class="productinfo text-center">
                <h2>@lang('header.not-found')</h2>
            </div>
        @endif
        @foreach ($books as $book)
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <a href="{{ route('book.show', $book->id) }}">
                                <img src="{{ $book->image }}" title="{{ $book->title }}"/></a>
                            <h2>{{ $book->price }}</h2>
                            <h4>{{ $book->title }}</h4>
                            <h5>{{ \App\Models\Author::find($book->author_id)->author_name }}</h5>
                            <h6>{{ $book->date_published }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop
@section('footer')
@stop
@section('script')
    <script src='{{ asset('/js/admin.js') }}'></script>
    <script src='{{ asset('/Bootstrap/js/jquery.scrollUp.min.js') }}'></script>
    <script src='{{ asset('/Bootstrap/js/price-range.js') }}'></script>
    <script src='{{ asset('/Bootstrap/js/jquery.prettyPhoto.js') }}'></script>
    <script src='{{ asset('/Bootstrap/js/main.js') }}'></script>
    <script src='{{ asset('/Bootstrap/js/sweet-alert.js') }}'></script>
@stop
