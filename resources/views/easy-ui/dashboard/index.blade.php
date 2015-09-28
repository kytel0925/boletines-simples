@extends('easy-ui.app')

@section('header.js')
    @parent
    <script src="{{asset('js/apps/AppDashboard.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/apps/AppMailings.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/apps/AppTasks.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/apps/AppSubscribers.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/apps/AppSubscribersLists.js')}}" type="text/javascript"></script>
@stop