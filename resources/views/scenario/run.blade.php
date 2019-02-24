
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

    @include('scenario.projections')

  </div>


  <div class="row"></div>

  @include('bug-reporter.api-bug')


@endsection


@section('footer-scripts')

  <script type="text/javascript">
    var listing_id = '{{ $listing->id }}';
  </script>
  <script src="/js/scenario.js"></script>

@endsection 



@section('header-scripts')

  <link rel="stylesheet" href="/css/scenario.css">

@endsection 