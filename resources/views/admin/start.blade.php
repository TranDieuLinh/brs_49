@extends('layouts.master')
@section('header')
    @include ('admin.header')
@stop
@section('sidebar-left')
    @include ('admin.slidebar')
@stop
@section('sidebar-right')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-file fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">26</div>
                                <div>@lang('sidebar.request')</div>
                            </div>
                        </div>
                    </div>
                    <a href="javascript:void(0)">
                        <div class="panel-footer">
                            <span class="pull-left">@lang ('header.view')</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-users fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">12</div>
                                <div>@lang('sidebar.user')</div>
                            </div>
                        </div>
                    </div>
                    <a href="javascript:void(0)">
                        <div class="panel-footer">
                            <span class="pull-left">@lang ('header.view')</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-tags fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">124</div>
                                <div>@lang('header.book')</div>
                            </div>
                        </div>
                    </div>
                    <a href="javascript:void(0)">
                        <div class="panel-footer">
                            <span class="pull-left">@lang ('header.view')</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-gift fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">13</div>
                                <div>@lang('header.gift')</div>
                            </div>
                        </div>
                    </div>
                    <a href="javascript:void(0)">
                        <div class="panel-footer">
                            <span class="pull-left">@lang ('header.view')</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- nhật kí hoạt động -->
            <div class="col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>@lang('header.activities')</strong>
                    </div>
                    <a href="javascript:void(0)" class="list-group-item">
                        admin1
                        <span class="pull-right text-muted small"><em>4 phút trước</em>
                                    </span>
                    </a>
                    <a href="javascript:void(0)" class="list-group-item">
                        Admin 2
                        <span class="pull-right text-muted small"><em>43 phút trước</em>
                                    </span>
                    </a>
                    <a href="javascript:void(0)" class="list-group-item">
                        Admin 3
                        <span class="pull-right text-muted small"><em>11:32 AM</em>
                                    </span>
                    </a>
                    <a href="javascript:void(0)" class="list-group-item">
                        Admin4
                        <span class="pull-right text-muted small"><em>9:49 AM</em>
                                    </span>
                    </a>
                    <a href="javascript:void(0)" class="list-group-item">
                        Admin 5
                        <span class="pull-right text-muted small"><em>Hôm qua</em>
                                    </span>
                    </a>
                    <a href="javascript:void(0)" class="btn btn-default btn-block">@lang ('header.view')</a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>@lang('header.view-request')</strong>
                    </div>
                    <a href="javascript:void(0)" class="list-group-item">
                        @lang('header.new-request')
                        <span class="pull-right text-muted small"><em>4</em>
                                    </span>
                        <a href="javascript:void(0)" class="list-group-item">
                            @lang('sidebar.resolved-request')
                            <span class="pull-right text-muted small"><em>27</em>
                                    </span>
                        </a>
                        <a href="javascript:void(0)" class="list-group-item">
                            @lang('header.canceled-by-admin')
                            <span class="pull-right text-muted small"><em>43</em>
                                    </span>
                        </a>
                        <a href="javascript:void(0)" class="list-group-item">
                            @lang('header.canceled-by-user')
                            <span class="pull-right text-muted small"><em>11</em>
                                    </span>
                        </a>
                        <a href="javascript:void(0)" class="btn btn-default btn-block">@lang ('header.view')</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@stop
@section('script')
@stop
