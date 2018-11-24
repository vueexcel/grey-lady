
@extends('layouts.app')


@section('content')


<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Zip Details for {{ app('request')->input('id') }}</h3>
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
  <script src="js/listings.js"></script>

@endsection 



@section('header-scripts')

  

@endsection 