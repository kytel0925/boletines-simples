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
        <link rel="stylesheet" type="text/css" href="{{asset('lib/easyui/themes/default/easyui.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('lib/easyui/themes/icon.css')}}">
        <link href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    @show
    @section('header.js')
            <!-- jQuery -->
        <script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
        <script src="{{asset('lib/easyui/jquery.easyui.min.js')}}" type="text/javascript"></script>
        <script type="text/javascript" src="{{asset('lib/easyui/locale/easyui-lang-es.js')}}"></script>
        <script src="{{asset('lib/tinymce/tinymce.min.js')}}" type="text/javascript"></script>

        <script type="text/javascript" src="{{asset('js/System.js')}}"></script>
        <script type="text/javascript">
            const base_url = '{{asset('')}}';
            System.url = base_url;
            $.ajaxSetup({
                headers: {
                    //'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
        </script>
    @show
</head>

<body class="easyui-layout">
    <style>
        #dashboard-apps div.dashboard-app{
            padding: 5px;
        }
    </style>
    <div data-options="region:'north'" style="height:40px">
        @include('easy-ui.toolbar')
    </div>
    <div data-options="region:'west',split:true" title="Apps" style="width:20%; max-width: 250px;">
        @include('easy-ui.sidebar')
    </div>
    <div data-options="region:'center',title:'Dashboard',iconCls:'fa fa-dashboard'" id="dashboard-apps">
        @section('app.body')
        @show
    </div>
    <!-- Final footers -->
    @section('footer.css')
    @show
    @section('footer.js')
    @show
</body>
</html>
