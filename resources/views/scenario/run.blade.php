
@extends('layouts.app')

@section('page-title')

  <div class="explore-details-header">
    <h3>Scenario Runner for <span>{{ $listing->details->location->address }}</span></h3>
  </div>


@endsection


@section('content')

  <div id="message-area"></div>

  <div class=" col-md-5">
    @include('scenario.controls')    
  </div>

  <div class=" col-md-7">
    @include('scenario.table')
  </div>


  <div class="row"></div>

  @include('scenario.request-response')


@endsection


@section('footer-scripts')

  <script src="/js/scenario.js"></script>

@endsection 



@section('header-scripts')

  <link rel="stylesheet" href="/css/scenario.css">

@endsection 