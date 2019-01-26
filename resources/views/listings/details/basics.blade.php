<div class="box box-default">
	<div class="box-body">

{{-- {{dd($listing)}} --}}

		<h4>Basic Details</h4>

    {!! formatPropertyDetailsBlock( $listing->details->beds, 'Beds' ) !!}
    {!! formatPropertyDetailsBlock( $listing->details->baths, 'Baths' ) !!}
    {!! formatPropertyDetailsBlock( formatLargeCurrency($listing->details->price), 'Price' ) !!}
    {!! formatPropertyDetailsBlock( $listing->details->livingArea, 'Sqft' ) !!}
    {!! formatPropertyDetailsBlock( $listing->details->purchaseType, 'Purchase Type' ) !!}
    {!! formatPropertyDetailsBlock( $listing->details->propertyType, 'Property Type' ) !!}
		
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