@extends('layouts.app')

@section('page-title')

  <div>
    <h3>Dashboard</h3>
  </div>


@endsection


@section('content')
  <div id="app">
    <dashboard-component  :data="{{ $stream }}" :news="{{ $news }}"/>
  </div>

@endsection
