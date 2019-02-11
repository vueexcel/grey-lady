<div class="box box-default">
	<div class="box-body">


	<h4>{{ $listing->details->location->address }} {{ $listing->details->location->city }}, {{ $listing->details->location->state }} {{ $listing->details->location->zip }} </h4>

    {!! formatPropertyDetailsBlock( $listing->details->purchaseType, 'Purchase Type' ) !!}
    {!! formatPropertyDetailsBlock( $listing->details->beds, 'Beds' ) !!}
    {!! formatPropertyDetailsBlock( $listing->details->baths, 'Baths' ) !!}
    {!! formatPropertyDetailsBlock( formatLargeCurrency($listing->details->price), 'Price' ) !!}
    <div class="row"></div>
    {!! formatPropertyDetailsBlock( $listing->details->propertyType, 'Property Type' ) !!}
    {!! formatPropertyDetailsBlock( $listing->details->livingArea, 'Sqft' ) !!}
    
		
	</div>
</div>