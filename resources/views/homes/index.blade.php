@extends('layouts.master')
@section('header')
    <nav>
        <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="#">@lang('header.home')</a></li>
            <li role="presentation"><a href="javascript:void(0)">@lang('header.account')</a></li>
            <li role="presentation"><a href="javascript:void(0)">@lang('sidebar.contact')</a></li>
        </ul>
    </nav>
@stop
@section('sidebar-up')
    <hr color="red">
@stop
@section('sidebar-left')
    @include ('layouts.sidebar')
@stop
@section('sidebar-right')
    <hr>
@stop
@section('footer')
@stop
