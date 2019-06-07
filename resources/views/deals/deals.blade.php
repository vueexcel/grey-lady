@extends('layouts.app')

@section('page-title')

  <div>
    <h3 data-step="1" data-intro="This is a tooltip!">Deals</h3>
  </div>

@endsection


@section('content')

  <div id="app">
    <deals-component :deals="{{  $deals  }}"/>
  </div>

@endsection