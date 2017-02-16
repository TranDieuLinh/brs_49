@extends('layouts.master')
@section('header')
    <link href='{{ asset('Bootstrap/css/prettyPhoto.css') }}' rel="stylesheet">
    <link href='{{ asset('Bootstrap/css/price-range.css') }}' rel="stylesheet">
    <link href='{{ asset('Bootstrap/css/animate.css') }}' rel="stylesheet">
    <link href='{{ asset('Bootstrap/css/main.css') }}' rel="stylesheet">
    <link type="text/css" href='{{ asset('Bootstrap/css/sweet-alert.css') }}' rel="stylesheet">
    <nav>
        <ul class="nav nav-pills pull-right">
            <li role="presentation"><a href="javascript:void(0)">@lang('header.home')</a></li>
            <li role="presentation" class="active"><a href="javascript:void(0)">@lang('header.account')</a></li>
            <li role="presentation"><a href="javascript:void(0)">@lang('sidebar.contact')</a></li>
        </ul>
    </nav>
@stop
@section('sidebar-right')
    <hr color="red">
    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2><p class="uppercase">@lang('login.login')</p></h2>
                        <form method="post" action="{{ Asset('login') }}" id="login1">
                            <div class="input-group">
                                <input id="email" type="email" class="form-control" placeholder=@lang('login.email') name="email">
                            </div>
                            <div class="input-group">
                                <input id="password" type="password" class="form-control" placeholder=@lang('login.password')
                                       name="password">
                            </div>
                            <button type="submit" class="btn btn-default" id="submit_login">@lang('login.login')
                            </button>
                        </form>
                    </div><!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">@lang('login.or')</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form"><!--sign up form-->
                        <h2><p class="uppercase">@lang('login.signup')</p></h2>
                        <form method="post" action="{{ Asset('login') }}" id="signup">
                            <div class="input-group">
                                <input id="name" type="text" class="form-control" placeholder=@lang('login.name') name="name">
                            </div>
                            <div class="input-group">
                                <input id="email" type="text" class="form-control" placeholder=@lang('login.email') name="email">
                            </div>
                            <div class="input-group">
                                <input id="password" type="password" class="form-control" placeholder=@lang('login.password')
                                       name="password">
                            </div>
                            <div class="input-group">
                                <input id="repassword" type="password" class="form-control" name="repassword"
                                       placeholder=@lang('login.repassword')>
                            </div>
                            <button id="sign-up1" type="submit" class="btn btn-default">
                                @lang('login.signup')
                            </button>
                        </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section><!--/form-->
@stop
@section('script')
    <script src='{{ asset('Bootstrap/js/jquery.scrollUp.min.js') }}'></script>
    <script src='{{ asset('Bootstrap/js/main.js') }}'></script>
    <script src='{{ asset('/js/admin.js') }}'></script>
    <script src='{{ asset('/bower_components/jqueryValidate/jquery.validate.js') }}'></script>
@stop
