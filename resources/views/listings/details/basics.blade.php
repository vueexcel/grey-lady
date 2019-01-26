<div class="box box-default">
	<div class="box-body">

{{-- {{dd($listing)}} --}}

		<h4>Basic Details</h4>

            <div class="col-sm-3 col-xs-6">
              <div class="description-block">
                <h5 class="description-header">{{ $listing->details->beds }}</h5>
                <span class="description-text">Beds</span>
              </div>
            </div>

            <div class="col-sm-3 col-xs-6">
              <div class="description-block">
                <h5 class="description-header">{{ $listing->details->baths }}</h5>
                <span class="description-text">Baths</span>
              </div>
            </div>

            <div class="col-sm-3 col-xs-6">
              <div class="description-block">
                <h5 class="description-header">{{ formatLargeCurrency($listing->details->price) }}</h5>
                <span class="description-text">Price</span>
              </div>
            </div>

            <div class="col-sm-3 col-xs-6">
              <div class="description-block">
                <h5 class="description-header">{{ $listing->details->livingArea }}</h5>
                <span class="description-text">Sqft</span>
              </div>
            </div>

            <div class="col-sm-3 col-xs-6">
              <div class="description-block">
                <h5 class="description-header">{{ $listing->details->purchaseType }}</h5>
                <span class="description-text">Purchase Type</span>
              </div>
            </div>

            <div class="col-sm-3 col-xs-6">
              <div class="description-block">
                <h5 class="description-header">{{ $listing->details->propertyType }}</h5>
                <span class="description-text">Property Type</span>
              </div>
            </div>
		
	</div>
</div>




<div class="box box-default">
  <div class="box-body">

    <h4>Description</h4>

    @if ( isset($listing->details->PublicRemarks) )

      <p>{{$listing->details->PublicRemarks}}</p>

    @else 

      <p>None available</p>

    @endif

  </div>
</div>

<div class="box box-default">
  <div class="box-body">

    <h4>Other Information</h4>

    

    {!! formatPropertyDetailsBlock( $listing->details->YearBuilt, 'Year Built' ) !!}

  </div>
</div>