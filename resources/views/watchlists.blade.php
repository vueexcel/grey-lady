
@extends('layouts.app')


@section('content')


<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">watchlists</h3>
  </div>
  <div class="box-body">
    <div style="overflow: auto">

      <div id="watchlists-search-form"></div>
    
      <div id="watchlists-datatable-wrapper"></div>  

    </div>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->

@endsection


@section('footer-scripts')

  <!-- page script -->
  <script src="js/watchlists.js"></script>

@endsection 



@section('header-scripts')



@endsection 

