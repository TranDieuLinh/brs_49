@extends('layouts.master')
@section('css')
    <link href='{{ asset('/Bootstrap/css/prettyPhoto.css') }}' rel="stylesheet">
    <link href='{{ asset('/Bootstrap/css/price-range.css') }}' rel="stylesheet">
    <link href='{{ asset('/Bootstrap/css/animate.css') }}' rel="stylesheet">
    <link href='{{ asset('/Bootstrap/css/main.css') }}' rel="stylesheet">
    <link href='{{ asset('/Bootstrap/css/responsive.css') }}' rel="stylesheet">
    <link type="text/css" href='{{ asset('Bootstrap/css/sweet-alert.css') }}' rel="stylesheet">
    <link href='{{ asset('/bower_components/bootstrap-star-rating/css/star-rating.css') }}' rel="stylesheet">
@stop
@section('header')
@stop
@section('sidebar-up')
    <div class="comment-template" style="display: none">
        <li class="comment-item">
            <!-- Avatar -->
            <div class="comment-avatar"><img src="">
            </div>
            <!-- Contenedor del Comentario -->
            <div class="comment-box">
                <div class="comment-head">
                    <h6 class="comment-name">
                        <a href="http://creaticode.com/blog"></a>
                    </h6>
                    <span class="comment-created-at"></span>
                    <i class="edit-comment fa fa-edit" data-commentid=""></i>
                    <i class="delete-comment fa fa-trash" data-commentid=""></i>
                </div>
                <div class="comment-content"></div>
            </div>
        </li>
    </div>
    <div class="review-template" style="display: none">
    <li class="review-item">
        <div class="comment-main-level">
            <!-- Avatar -->
            <div class="comment-avatar"><img src=""></div>
            <!-- Contenedor del Comentario -->
            <div class="comment-box">
                <div class="comment-head">
                    <h6 class="comment-name">
                        <a href="http://creaticode.com/blog"></a>
                    </h6>
                    <span class="created_at"></span>
                    <i class="fa fa-reply reply-review" id="reply" data="review_id"></i>
                    <i class="fa fa-heart"></i>
                    <i class="edit-review fa fa-edit" data-reviewid=""></i>
                    <i class="delete-review fa fa-trash" data-reviewid=""></i>
                </div>
                <div class="comment-content review-content"></div>
                <div class="comment-content edit-review-content" style="display: none">
                    <input type="hidden" name="book-id" value="book_id">
                    <textarea name="review" placeholder="Viết nhận xét về sách?"></textarea>
                    <button type="submit"
                            class="btn btn-success btn-edit-review green">@lang('detail.review')</button>
                </div>
            </div>
        </div>
        <ul class="comments-list reply-list hidden" id="" data-reviewid="">
            <li class="comment-form">
                <!-- Avatar -->
                <div class="comment-avatar"><img src=""></div>
                <!-- Contenedor del Comentario -->
                <div class="comment-box">
                    <div class="comment-head">
                        <h6 class="comment-name">
                            <a href="http://creaticode.com/blog"></a>
                        </h6>
                    </div>
                    <div class="comment-content">
                        <input name="status" type="hidden" value="">
                        <input type="hidden" name="book-id-comment" value="">
                        <textarea name="comment"
                                  placeholder="Viết bình luận?"></textarea>
                        <button type="button"
                                class="btn btn-comment green">@lang('detail.comment')
                        </button>
                    </div>
                </div>
            </li>
        </ul>
    </li>
    </div>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 padding-20">
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-4">
                        <div>
                            <img src="{{ $book->image }}" title="{{ $book->title }}"/>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="productinfo">
                            <h2> {{ $book->title }}</h2>
                            <h2> {{ $book->price }}</h2>
                            <p><b>@lang('detail.author')</b> {{ $author->author_name }}</p>
                            <p><b>@lang('detail.category')</b>{{ $category->name }}</p>
                            <input id="input-id" type="text" class="rating" value = "{{ $value }}"
                                   data-userid="{{Auth::guest()? 0 : Auth::user()->id }}" data-bookid="{{ $book->id }}">
                        </div><!--/product-information-->
                    </div>
                    <div class="col-sm-2">
                        <label class="score">Score:  {{ $score }}</label>
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
                <ul class="comments-list">
                    @if (count($reviews)!= 0)
                        @foreach ($reviews as $review)
                            <li class="review-item">
                                <div class="comment-main-level">
                                    <!-- Avatar -->
                                    <div class="comment-avatar">
                                        <img src={{ $review->user->image }}></div>
                                    <!-- Contenedor del Comentario -->
                                    <div class="comment-box">
                                        <div class="comment-head">
                                            <h6 class="comment-name">
                                                <a href="{{ route('user.show',  $review->user->id) }}">{{ $review->user->name }}</a>
                                            </h6>
                                            <span>{{ $review->created_at }}</span>
                                            <i class="fa fa-reply reply-review" id="reply" data-reviewid="{{ $review->id }}"></i>
                                            <i class="fa fa-heart"></i>
                                            @if((!Auth::guest()) && ($review->user_id) == (Auth::user()->id))
                                                <i class="edit-review fa fa-edit" data-reviewid="{{ $review->id }}"></i>
                                                <i class="delete-review fa fa-trash" data-reviewid="{{ $review->id }}"></i>
                                            @endif
                                        </div>
                                        <div class="comment-content review-content">{{ $review->content }}</div>
                                        <div class="comment-content edit-review-content" style="display: none">
                                            <input type="hidden" name="book-id" value="{{ $book->id }}">
                                            <textarea name="review" placeholder="Viết nhận xét về sách?"></textarea>
                                            <button type="submit"
                                                    class="btn btn-success btn-edit-review green">@lang('detail.editreview')</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Respuestas de los comentarios -->
                                <ul class="comments-list reply-list hidden" id="comment-{{ $review->id }}" data-reviewid="{{ $review->id }}">
                                    @if(count($comments = $review->comments) != 0)
                                        @foreach($comments as $comment)
                                            <li class="comment-item">
                                                <!-- Avatar -->
                                                <div class="comment-avatar"><img src={{ $comment->user->image }}>
                                                </div>
                                                <!-- Contenedor del Comentario -->
                                                <div class="comment-box">
                                                    <div class="comment-head">
                                                        <h6 class="comment-name">
                                                            <a href="{{ route('user.show',  $comment->user->id) }}">{{ $comment->user->name }}</a>
                                                        </h6>
                                                        <span>{{ $comment->created_at }}</span>
                                                        @if((!Auth::guest()) && ($comment->user_id) == (Auth::user()->id))
                                                            <i class="edit-comment fa fa-edit" data-commentid="{{ $comment->id }}"></i>
                                                            <i class="delete-comment fa fa-trash" data-commentid="{{ $comment->id }}"></i>
                                                        @endif
                                                    </div>
                                                    <div class="comment-content com-content">{{ $comment->content }}</div>
                                                    <div class="comment-content edit-comment-content" style="display: none">
                                                        <input type="hidden" name="book-id" value="{{ $book->id }}">
                                                        <textarea name="comment" placeholder=""></textarea>
                                                        <button type="submit"
                                                                class="btn btn-success btn-edit-comment green">@lang('detail.editreview')</button>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    @endif
                                    @if( !Auth::guest() )
                                        <li class="comment-form">
                                            <!-- Avatar -->
                                            <div class="comment-avatar comment-ava"><img src={{ Auth::user()->image }}></div>
                                            <!-- Contenedor del Comentario -->
                                            <div class="comment-box">
                                                <div class="comment-head">
                                                    <h6 class="comment-name comment-comment-name">
                                                        <a href="{{ route('user.show', Auth::user()->id) }}">{{ Auth::user()->name }}</a>
                                                    </h6>
                                                </div>
                                                <div class="comment-content">
                                                    <input name="status" type="hidden" value="{{ $review->id }}">
                                                    <input type="hidden" name="book-id-comment" value="{{ $book->id }}">
                                                    <textarea name="comment"
                                                              placeholder="Viết bình luận?"></textarea>
                                                    <button type="button"
                                                            class="btn btn-comment green">@lang('detail.comment')
                                                    </button>
                                                </div>
                                            </div>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endforeach
                    @endif
                    @if(!Auth::guest())
                        <li class="review-form">
                            <div class="comment-main-level">
                                <!-- Avatar -->
                                <div class="comment-avatar">
                                    <img src={{ Auth::user()->image }}></div>
                                <!-- Contenedor del Comentario -->
                                <div class="comment-box">
                                    <div class="comment-head">
                                        <h6 class="comment-name">
                                            <a href="{{ route('user.show',  Auth::user()->id) }}">{{ Auth::user()->name }}</a>
                                        </h6>
                                    </div>
                                    <div class="comment-content">
                                        <input type="hidden" name="book-id" value="{{ $book->id }}">
                                        <textarea name="review" placeholder="Viết nhận xét về sách?"></textarea>
                                        <button type="submit"
                                                class="btn btn-success btn-review green">@lang('detail.review')</button>
                                    </div>
                                </div>
                            </div>
                        </li>
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
    <script src='{{ asset('/bower_components/bootstrap-star-rating/js/star-rating.js') }}' type="text/javascript"></script>
    <script src='{{ asset('/js/book_detail.js') }}'></script>
@stop
