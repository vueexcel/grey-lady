
@extends('layouts.app')

@section('page-title')
  <?php $dealObj = json_decode($deal); ?>
  <div class="explore-details-header">
    <h3>Deals &nbsp; > &nbsp;<span>{{ $dealObj->name }} &nbsp; >&nbsp; Scenario</span> </h3>
  </div>

@endsection


@section('content')
  <?php 
  $list = json_encode($listing);
  ?>

  <div id="message-area"></div>
  <div id="app">
    <div class="col-md-12">
      <table-component :listing="{{ $list }}" :deal="{{ $deal }}" :scenario="{{ $scenario }}"/>
    </div>
  </div>
  



@endsection


@section('footer-scripts')

  <!-- <script type="text/javascript">
    var listing_id = '{{ $listing->id }}';
  </script>
  <script src="/js/scenario.js"></script> -->

@endsection 



@section('header-scripts')

  <link rel="stylesheet" href="/css/scenario.css">

@endsection 
