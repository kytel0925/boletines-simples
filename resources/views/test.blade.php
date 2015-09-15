@extends('startbootstrap-sb-admin.app')

@section('app.body')
    Some data: {{ rand(1000, 8000) }}
@stop