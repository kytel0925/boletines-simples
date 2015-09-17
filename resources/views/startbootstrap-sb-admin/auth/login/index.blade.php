@extends('startbootstrap-sb-admin.auth.app')
@section('app.title', trans('auth.title'))

@section('auth.content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">{{trans('auth.views.login.title')}}</h3>
            </div>
            <div class="panel-body">
                <form role="form" action="{{asset('login')}}" method="post">
                    {!! csrf_field() !!}
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="{{trans('auth.views.login.labels.email')}}" name="email" type="email" autofocus>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="{{trans('auth.views.login.labels.password')}}" name="password" type="password" value="">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input name="remember" type="checkbox" value="Remember Me">{{trans('auth.views.login.labels.remember-me')}}
                            </label>
                        </div>
                        <!-- Change this to a button or input when using this as a form -->
                        <button class="btn btn-lg btn-success btn-block">{{trans('auth.views.login.labels.login')}}</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@stop