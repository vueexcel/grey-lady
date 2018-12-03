<div class='bed-by-cap'>
	@if (isset($zip[0]->calculated_fields->by_beds))

	  @foreach ($zip[0]->calculated_fields->by_beds as $bed => $bed_zip_stats)

	    <div class="precentage">
	      <span class="precentage-top">{{ formatPercentage($bed_zip_stats->average_cap_rate, 1) }}</span>
	      <span class="precentage-bottom">{{ $bed }}b</span>
	    </div>
	  
	  @endforeach

	@endif  
</div>