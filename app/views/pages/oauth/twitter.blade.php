@extends('layouts.default')


@section('header')
<meta http-equiv="refresh" content="300; URL={{URL::to('/oauth/login-with-twitter')}}">
@stop

@section('content')
this is some content
@stop