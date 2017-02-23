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
    <nav>
        <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="{{ url('/home') }}">@lang('header.home')</a></li>
            <li role="presentation"><a href="{{ action('AuthController@index') }}">@lang('header.account')</a>
            </li>
            <li role="presentation"><a href="javascript:void(0)">@lang('sidebar.contact')</a></li>
        </ul>
    </nav>
@stop
@section('sidebar-up')
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div>
                            <img src="{{ $book->image }}" title="{{ $book->title }}"/>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="productinfo">
                            <h2> {{ $book->title }}</h2>
                            <h2> {{ $book->price }}</h2>
                            <p><b>@lang('detail.author')</b> {{ $author->author_name }}</p>
                            <p><b>@lang('detail.category')</b>{{ $category->name }}</p>
                        </div><!--/product-information-->
                    </div>
                </div><!--/product-details-->
                <br/>
                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">@lang('detail.information')</h2>
                    <h4 style="color: #6666ff">{{ $book->title }}</h4>
                    <p>{{ $book->description }}</p>
                    <br/>

                </div>
                <table class="table table-condensed">
                    <tr class="info">
                        <td>@lang('detail.producer')</td>
                        <td>{{ $book->publisher }}</td>
                    </tr>
                    <tr class="active">
                        <td>@lang('detail.author')</td>
                        <td>{{ $author->author_name }}</td>
                    </tr>
                    <tr class="info">
                        <td>@lang('detail.page')</td>
                        <td>{{ $book->number_of_page }}</td>
                    </tr>
                    <tr class="active">
                        <td>@lang('detail.publish-date')</td>
                        <td>{{ $book->date_published }}</td>
                    </tr>
                    <tr class="info">
                        <td>@lang('detail.category')</td>
                        <td>{{ $category->name }}</td>
                    </tr>
                </table>
                <br/>
            </div>
        </div>
        <div class="row">
            <!-- Contenedor Principal -->
            <div class="comments-container">
                <h1>@lang('detail.comment')</h1>
                <ul id="comments-list" class="comments-list">
                    @if (count($reviews)!= 0)
                        @foreach ($reviews as $review)
                            <li>
                                <div class="comment-main-level">
                                    <!-- Avatar -->
                                    <div class="comment-avatar">
                                        <img src={{ $review->user->image }}></div>
                                    <!-- Contenedor del Comentario -->
                                    <div class="comment-box">
                                        <div class="comment-head">
                                            <h6 class="comment-name">
                                                <a href="http://creaticode.com/blog">{{ $review->user->name }}</a>
                                            </h6>
                                            <span>{{ $review->created_at }}</span>
                                            <i class="fa fa-reply"></i>
                                            <i class="fa fa-heart"></i>
                                            <i class="fa fa-heart"></i>
                                            <i class="fa fa-heart"></i>
                                            <i class="fa fa-heart"></i>
                                            <i class="fa fa-heart"></i>
                                        </div>
                                        <div class="comment-content">{{ $review->content }}</div>
                                    </div>
                                </div>

                                <!-- Respuestas de los comentarios -->
                                <ul class="comments-list reply-list">
                                    @if(count($comments = $review->comments) != 0)
                                        @foreach($comments as $comment)
                                            <li>
                                                <!-- Avatar -->
                                                <div class="comment-avatar"><img src={{ $comment->user->image }}></div>
                                                <!-- Contenedor del Comentario -->
                                                <div class="comment-box">
                                                    <div class="comment-head">
                                                        <h6 class="comment-name">
                                                            <a href="http://creaticode.com/blog">{{ $comment->user->name }}</a>
                                                        </h6>
                                                        <span>{{ $comment->created_at }}</span>
                                                    </div>
                                                    <div class="comment-content">{{ $comment->content }}</div>
                                                </div>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </li>
                        @endforeach
                        @if(!Auth::guest())
                                <div class="comment-main-level">
                                    <!-- Avatar -->
                                    <div class="comment-avatar">
                                        <img src={{ Auth::user()->image }}></div>
                                    <!-- Contenedor del Comentario -->
                                    <div class="comment-box">
                                        <div class="comment-head">
                                            <h6 class="comment-name">
                                                <a href="http://creaticode.com/blog">{{ Auth::user()->name }}</a>
                                            </h6>
                                        </div>
                                        {!! Form::open(['method'=>'GET', 'route' => 'review'])  !!}
                                        <div class="comment-content">
                                            <input type="hidden" name="book-id" value="{{ $book->id }}">
                                            <textarea name="review" placeholder="What are you doing right now?" ></textarea>
                                            <button type="submit" class="btn btn-success green">Nhận xét</button>
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            @endif
                    @endif
                </ul>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script src='{{ asset('/js/admin.js') }}'></script>
    <script src='{{ asset('/Bootstrap/js/jquery.scrollUp.min.js') }}'></script>
    <script src='{{ asset('/Bootstrap/js/price-range.js') }}'></script>
    <script src='{{ asset('/Bootstrap/js/jquery.prettyPhoto.js') }}'></script>
    <script src='{{ asset('/Bootstrap/js/main.js') }}'></script>
    <script src='{{ asset('/Bootstrap/js/sweet-alert.js') }}'></script>
@stop
