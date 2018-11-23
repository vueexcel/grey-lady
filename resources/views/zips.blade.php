
@extends('layouts.app')


@section('content')


<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Zips</h3>
  </div>
  <div class="box-body">
    <div style="overflow: auto">

      <div id="zips-search-form"></div>
    
      <div id="zips-datatable-wrapper"></div>  

    </div>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->

@endsection


@section('footer-scripts')

  <!-- page script -->
  <script src="js/zips.js"></script>

@endsection 



@section('header-scripts')



@endsection 

