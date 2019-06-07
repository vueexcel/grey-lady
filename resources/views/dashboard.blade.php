@extends('layouts.app')

@section('page-title')

  <div>
    <h3 data-step="1" data-intro="This is a tooltip!">Dashboard</h3>
  </div>


@endsection


@section('content')
  <div id="app">
    <dashboard-component  :data="{{ $stream }}" :news="{{ $news }}" :deals="{{  $deals  }}"/>
  </div>
  
@endsection
