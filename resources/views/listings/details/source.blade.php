<div class="box box-default">
	<div class="box-body">

			
		@if (  $listing->details->purchaseType == 'sell' && $listing->details->price > 0) 
			{!! makeButton('Run Scenario', '/scenario/run/' . $listing->id) !!}
		@endif

		@if (  isset($listing->source->source_pdp)) 
			{!! makeButton('Source', $listing->source->source_pdp) !!}
		@endif

		@if (  isset($listing->source->source_link) && isset($listing->source->source) ) 
			{!! makeButton('SRP Link', 'https://' . $listing->source->source . $listing->source->source_link) !!}	
		@elseif ( isset($listing->source->source_link) )
			{!! makeButton('SRP Link', $listing->source->source_link) !!}	
		@endif

		<div class='row' style="padding-bottom: 15px"></div>

		{!! makeButton($listing->details->location->zip . ' Details', '/explore/' . $listing->details->location->zip) !!}	
		{!! makeButton('Zips in ' . $listing->details->location->city, '/explore/?town=' . $listing->details->location->city) !!}	
		<a id='delete-listing' data-listing-id="{{$listing->id}}" type="button" class="btn btn-default" href="#">Delete Listing</a>

	</div>
</div>