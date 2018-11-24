
@extends('layouts.app')


@section('content')


<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title"><a href="/listings">Listings</a> > Details for {{ app('request')->input('id') }}</h3>
  </div>
  <div class="box-body">
    <div style="overflow: auto">


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