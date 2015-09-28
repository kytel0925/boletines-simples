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
        <link rel="stylesheet" type="text/css" href="{{asset('lib/easyui/themes/bootstrap/easyui.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('lib/easyui/themes/icon.css')}}">
    @show
    @section('header.js')
        <!-- jQuery -->
        <script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
        <script src="{{asset('lib/easyui/jquery.easyui.min.js')}}" type="text/javascript"></script>
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
@show
</body>
</html>
