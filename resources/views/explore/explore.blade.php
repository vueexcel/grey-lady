
@extends('layouts.app')


@section('content')


<div class="box box-default">
  <div class="box-body">
  	<div id="message-area"></div>
  	<a href="/explore/export{{ str_replace(Request::url(), '', Request::fullUrl()) }}" class="btn btn-primary">Export</a>
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

  <script src="/js/zips.js"></script>

@endsection 



@section('header-scripts')



@endsection 



@section('page-title')

<h3>Explore Zip Codes</h3>

@endsection