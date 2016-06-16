@extends('layouts.default')

@section('content')

@include('pages.dashboard.nav')

<div class="row">
  <div class="six-columns end">
  <h3>Text Filtering</h3>
  <ul>
    <li>Comma deliminated list</li>
    <li>inputs correspond to eachother</li>
  </ul>

  {{Form::open([])}}
  {{Form::checkbox('text-filter-checkbox', '', $checked=$dashboardPreferences->filter_enabled, [])}}
  {{Form::label($name = 'text-filter-checkboxlabel', '', [])}}

  {{Form::textarea('text-search-values-textarea', $dashboardPreferences->filter_search, [])}}
  {{Form::textarea('text-replacement-values-textarea', $dashboardPreferences->filter_replace, [])}}
  {{Form::submit('Update', ['Class' => 'button'])}}
  {{Form::close()}}
  
  <br/>
  
  @include('pages.dashboard.usage')
  
  </div>
</div>
@stop