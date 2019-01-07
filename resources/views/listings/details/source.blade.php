<div class="box box-default">
	<div class="box-body">
		<h4>Found on:</h4>

		@if ( isset($listing->source->source) )
			<p>{{ $listing->source->source }} - 
				<a target=_blank href="{{ $listing->source->source_pdp }}">PDP Link</a> /
				<a target=_blank href="{{ $listing->source->source_link }}">Found on</a>
			</p>
		@endif

	</div>
</div>