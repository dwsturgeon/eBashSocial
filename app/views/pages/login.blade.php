@extends('layouts.default')

@section('content')
<div class="row">
  <div class="six-columns end">
  <h1>Dashboard Login</h1>
  {{Form::open()}}
  {{ Form::email('email')}}
  {{ Form::password('password')}}
  {{ Form::submit('Login', ['class' => 'button'])}}
  {{Form::close()}}
  </div>
</div>
@stop