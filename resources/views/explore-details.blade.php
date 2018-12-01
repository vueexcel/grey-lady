
@extends('layouts.app')


@section('content')

<div id="message-area"></div>

<div class=" col-md-8">
  
  <div class="box box-default">
    <div class="box-body">

      Beds vs Cap Rate      
    
    </div>
  </div>

  <div class="box box-default">
    <div class="box-body">

      Listings datatable
    
    </div>
  </div>

</div>


<div class=" col-md-4">
  
  <div class="box box-default">
    <div class="box-body">
      
      Actions

    </div>
  </div>

  <div class="box box-default">
    <div class="box-body">
      
      Zip Summary

    </div>
  </div>

  <div class="box box-default">
    <div class="box-body">
      
      Housing

    </div>
  </div>

  <div class="box box-default">
    <div class="box-body">
      
      Income

    </div>
  </div>

  <div class="box box-default">
    <div class="box-body">
      
      Education

    </div>
  </div>


</div>


{{ var_dump($zip[0]) }}


@endsection


@section('footer-scripts')

  <!-- page script -->
  <script type="text/javascript"></script>


  <script src="/js/zips.js"></script>

@endsection 



@section('header-scripts')



@endsection 



@section('page-title')

<h3>Explore > {{ $zip[0]->details->zip }}</h3>

@endsection