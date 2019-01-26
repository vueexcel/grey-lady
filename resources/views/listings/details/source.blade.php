<div class="box box-default">
	<div class="box-body">

		{!! makeButton('Source', $listing->source->source_pdp) !!}
		{!! makeButton('SRP Link', $listing->source->source_link) !!}	

		<div class='row' style="padding-bottom: 15px"></div>

		{!! makeButton($listing->details->location->zip . ' Details', '/explore/' . $listing->details->location->zip) !!}	
		{!! makeButton('Zips in ' . $listing->details->location->city, '/explore/?town=' . $listing->details->location->city) !!}	

	</div>
</div>


