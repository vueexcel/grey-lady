<div class="box box-default">
	<div class="box-body">
		<h4>Found on:</h4>

			<p>{{ $listing->source->source }} - 

				@if ( isset($listing->source->source_pdp) )
					<a target=_blank href="{{ $listing->source->source_pdp }}">PDP Link</a> /	
				@endif	

				@if ( isset($listing->source->source_link) )
					<a target=_blank href="{{ $listing->source->source_link }}">Found on</a>
				@endif	
			</p>
	</div>
</div>