
@extends('layouts.app')


@section('content')

{{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

<div class="box box-default">
  <div class="box-body">
  	<div id="message-area"></div>
    <div style="overflow: auto">

      {{-- <div id="zips-search-form"></div> --}}
    
      <div id="favoritezips-datatable-wrapper"></div>  

    </div>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->

@endsection


@section('footer-scripts')

  <!-- page script -->

  <script type="text/javascript">
    
    
    
  </script>

  <script src="/js/favoritezips.js"></script>

@endsection 



@section('header-scripts')
<meta name="csrf-token" content="{{ csrf_token() }}">


@endsection 



@section('page-title')

<h3>Explore Zip Codes</h3>

@endsection