<!DOCTYPE html>
<html lang="{{App::getLocale()}}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('app.description')">
    <meta name="author" content="Telmo Riofrio <telmorafael.riofriot@gmail.com>">

    <title>@yield('app.title')</title>

    @section('header.css')
        <!-- Bootstrap Core CSS -->
        <link href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="{{asset('bower_components/metisMenu/dist/metisMenu.min.css')}}" rel="stylesheet">

        <!-- Custom CSS dist/css/sb-admin-2.css -->
        <link href="{{asset('bower_components/startbootstrap-sb-admin-2/dist/css/sb-admin-2.css')}}" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    @show
    @section('header.js')
        <!-- jQuery -->
        <script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="{{asset('bower_components/metisMenu/dist/metisMenu.min.js')}}"></script>
    @show
</head>

<body>
    <!-- Main application HTML -->
    @section('app.body')
    @show

    <!-- Final footers -->
    @section('footer.css')

    @show
    @section('footer.js')
        <!-- Custom Theme JavaScript -->
        <script src="{{asset('bower_components/startbootstrap-sb-admin-2/dist/js/sb-admin-2.js')}}"></script>
    @show
</body>
</html>
