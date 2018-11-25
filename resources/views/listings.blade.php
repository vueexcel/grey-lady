
@extends('layouts.app')


@section('content')


<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Listings</h3> 
    <a type="button" class="btn btn-default" href="/listings/create">Create New Listing</a>
  </div>
  <div class="box-body">
    <div style="overflow: auto">

      <div id="listings-search-form"></div>
    
      <div id="listing-datatable-wrapper"></div>  

    </div>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->

@endsection


@section('footer-scripts')

  <!-- page script -->
  <script src="/js/listings.js"></script>

@endsection 



@section('header-scripts')

  

@endsection 

