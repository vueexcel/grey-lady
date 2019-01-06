
@extends('layouts.app')


@section('content')

<div id="message-area"></div>

<div class="col-md-8 explore-details">

  @include('listings.details.basics')

  @include('listings.details.amenities')

  @include('explore.zip-summary')

  @include('general.listing-datatable')

  @include('explore.top-listings')

</div>


<div class=" col-md-4">

  @include('listings.details.agent')

  @include('explore.housing')

  @include('explore.income')

  @include('explore.education')

  @include('explore.watchlist')

</div>



<div class="col-md-12 row"> 

  @include('general.dump-response')

</div>




@endsection


@section('footer-scripts')

  <!-- page script -->
  <script type="text/javascript">
    var explore_details_zip = '{{$zip[0]->details->zip}}';
    {{-- var api_listing_information = {{ json_encode($listing) }}; --}}
  </script>
  <script src="/js/listings.js"></script>
  {{-- <script src="/js/listings-details.js"></script> --}}


@endsection 



@section('header-scripts')

  <link rel="stylesheet" href="/css/listings-details.css">

@endsection 


@section('page-title')

  <div class="explore-details-header">
    <h3><span>{{ $listing->details->location->address }}, {{ $listing->details->location->city }} {{ $listing->details->location->zip }}</span></h3>
  </div>


@endsection