
@extends('layouts.app')


@section('content')

{{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

<div class="box box-default">
  <div class="box-body">
  	<div id="message-area"></div>
    <div style="overflow: auto">

      {{-- <div id="listings-search-form"></div> --}}
    
      <div id="favoritelistings-datatable-wrapper"></div>  

    </div>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->

@endsection


@section('footer-scripts')
  
  <script src="/js/config/favoritelistings.js"></script>
  <script src="/js/favoritelistings.js"></script>

  <script type="text/javascript">
    
      $("#favoritelistings-datatable-wrapper").on('click', '#remove-favorite-listing' ,function(event) {
        event.preventDefault();
        var listing_id = $(this).data('listingid');

        DeleteListingAsFavoritebyGreylady(listing_id, function () {
          alert('removed!! reloading....');
          location.reload(true);
        });


      });

  </script>

@endsection 



@section('header-scripts')
  <!-- page script -->
  <script type="text/javascript">
    var favorite_listing_ids = '{!! $favorite_ids !!}';
  </script>
  <meta name="csrf-token" content="{{ csrf_token() }}">


@endsection 



@section('page-title')

<h3>Explore Zip Codes</h3>

@endsection