@extends('easy-ui.app')

@section('header.js')
    @parent
    <script src="{{asset('js/apps/AppDashboard.js')}}" type="text/javascript"></script>
@stop

@section('app.body')
    <div id="wrapper">
        <div id="AppDashboard" data-id="AppDashboard">
            <div id="dashboard" data-id="dashboard">
                @yield('dashboard.dash')
            </div>
            <div id="mailings-edit" data-id="mailings-edit">
                @include('easy-ui.mailings.edit')
            </div>
            <div id="mailings-tasks" data-id="mailings-tasks">
                @include('easy-ui.mailings.tasks')
            </div>
        </div>
    </div>
@stop