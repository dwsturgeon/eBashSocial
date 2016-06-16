@extends('layouts.default')

@section('content')

@include('pages.dashboard.nav')

<div class="row">
  <div class="six-columns end">
  {{Form::open()}}
  <h3>Twitter Tags/Mentions</h3>
  {{Form::textarea('twitterQuery', $twitterQuery)}}
  <h3>Instagram Tag</h3>
  {{Form::textarea('instagramTag', $instagramTag)}}
  {{Form::submit('Update', ['class' => 'button'])}}
  {{Form::close()}}
  <br/>
  
  @include('pages.dashboard.usage')

  </div>
</div>
@stop