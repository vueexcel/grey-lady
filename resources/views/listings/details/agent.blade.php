<div class="box box-default">
	<div class="box-body">
		<h4>Listed by:</h4>

		@if ( isset($listing->details->ListAgentFirstName) && isset($listing->details->ListAgentLastName) )
			<p>{{ $listing->details->ListAgentFirstName }} {{ $listing->details->ListAgentLastName }} </p>
		@endif

		@if ( isset($listing->details->ListAgentPreferredEmail) )
			<p>{{ $listing->details->ListAgentPreferredEmail }}</p>
		@endif

		@if ( isset($listing->details->ListAgentPreferredPhone) )
			<p>{{ $listing->details->ListAgentPreferredPhone }}</p>
		@endif

	</div>
</div>