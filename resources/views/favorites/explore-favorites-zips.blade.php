
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
  
  <script src="/js/config/favoritezips.js"></script>
  <script src="/js/favoritezips.js"></script>

  <script type="text/javascript">
    
    $("#favoritezips-datatable-wrapper").on('click', '#remove-favorite-zip' ,function(event) {
        event.preventDefault();
        var zipid = $(this).data('zipid');

        DeleteZipAsFavoritebyGreylady(zipid, function () {
          alert('removed!! reloading....');
          location.reload(true);
        });


      });

  </script>

@endsection 



@section('header-scripts')
  <!-- page script -->
  <script type="text/javascript">
    var favorite_zip_ids = '{!! $favorite_ids !!}';
  </script>
  <meta name="csrf-token" content="{{ csrf_token() }}">


@endsection 



@section('page-title')

<h3>Explore Zip Codes</h3>

@endsection