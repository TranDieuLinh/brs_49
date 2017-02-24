<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="Dieu Linh">
    <meta name='csrf-token' content='{{ csrf_token() }}'>
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <!-- Bootstrap Core CSS -->
    <link href='{{ asset('/bower_components/bootstrap/dist/css/bootstrap.min.css') }}' rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href='{{ asset('/bower_components/metisMenu/dist/metisMenu.min.css') }}' rel="stylesheet">
    <!-- Custom CSS -->
    <link href='{{ asset('/css/admin.css') }}' rel="stylesheet">
    <link href='{{ asset('/css/sweetalert.css') }}' rel="stylesheet">
    <!-- Custom Fonts -->
    <link href='{{ asset('/bower_components/font-awesome/css/font-awesome.min.css') }}' rel="stylesheet">
    @yield('css')
</head>
<body>
<div class="container">
    <div class="header clearfix custom-line">
        @yield('header')
    </div>
    <div class="">
        @yield('sidebar-up')
    </div>
    @if (session('message'))
        <div class="alert alert-{{ session('status') }}">
            {{ session('message') }}
        </div>
    @endif
    <div class="row-l">
        <div class="row marketing">
            <div class="col-sm-3">
                @yield('sidebar-left')
            </div>
            <div class="col-sm-9">
                @yield('sidebar-right')
            </div>
        </div>
        <footer class="footer">
            @yield('footer')
        </footer>
    </div> <!-- /container -->
</div>
    <!-- jQuery -->
    <script src='{{ asset('/bower_components/jquery/dist/jquery.min.js') }}'></script>
    <!-- Bootstrap Core JavaScript -->
    <script src='{{ asset('/bower_components/bootstrap/dist/js/bootstrap.min.js') }}'></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src='{{ asset('/bower_components/metisMenu/dist/metisMenu.min.js') }}'></script>
    <!-- Custom Theme JavaScript -->
    <script src='{{ asset('/js/sweetalert-dev.js') }}'></script>
    @yield('script')
</body>
</html>
