@extends('layouts.default')

@section('content')
<nav class="top-bar" data-topbar>
  <ul class="title-area">
    <li class="name">
      <h1><a href="{{URL::action('DashboardController@getEditTags')}}">Dashboard</a></h1>
    </li>
     <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
  </ul>

  <section class="top-bar-section">
    <!-- Right Nav Section -->
    <ul class="right">
      <li><a href="{{URL::to('logout')}}">Logout</a></li>
    </ul>

    <!-- Left Nav Section -->
    <ul class="left">
      <li><a href="{{URL::action('DashboardController@getEditTags')}}">Tags</a></li>
    </ul>
  </section>
</nav>

<div class="row">
  <div class="six-columns end">
  {{Form::open()}}
  <h3>Twitter Query</h3>
  {{Form::textarea('twitterQuery', $twitterQuery)}}
  <h3>Instagram Tag</h3>
  {{Form::textarea('instagramTag', $instagramTag)}}
  {{Form::submit('Update')}}
  {{Form::close()}}
  <br/>
  <h3>Usage</h3>
  <ul>
  	<li>update tags in this window</li>
  	<li>open <a href="{{URL::action('OAuthController@getLoginWithTwitter')}}" target="_blank">Twitter url</a></li>
  	<li>open <a href="{{URL::action('OAuthController@getLoginWithInstagram')}}" target="_blank">Instagram url</a></li>
  	<li>Leave these windows open for updates!</li>
  	<li><a href="{{URL::to('/')}}" target="_blank">View Content!<a/></li>
  </ul>
  </div>
</div>
@stop