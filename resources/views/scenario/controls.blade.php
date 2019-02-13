<div class="box box-default">
	<div class="box-body">

	<h3>{{ $listing->details->location->address }} {{ $listing->details->location->city }}, {{ $listing->details->location->state }} {{ $listing->details->location->zip }} </h3>

    {!! formatPropertyDetailsBlock( $listing->details->propertyType, 'Property Type' ) !!}
    {!! formatPropertyDetailsBlock( $listing->details->beds, 'Beds' ) !!}
    {!! formatPropertyDetailsBlock( $listing->details->baths, 'Baths' ) !!}
    {!! formatPropertyDetailsBlock( $listing->details->livingArea, 'Sqft' ) !!}

    <div class="row"></div>
    
	<h4>Controls</h4>    

	<table id="scenario-control">
		<form id="scenario-control-form">
			<tr>
				<td><b>Metric</b></td>
				<td><b>Current</b></td>
				<td><b>Base</b></td>
			</tr>
			<tr>
				<td>
					Purchase Price
					<input type="range" name="purchase_price" min="{{ $listing->details->price * 0.5 }}" max="{{ $listing->details->price * 1.5 }}" value="{{ $listing->details->price }}" step="10000">
				</td>
				<td><span class="scenario-value" id="purchase_price"></span></td>
				<td><span>{{ formatLargeCurrency($listing->details->price) }}</span></td>
			</tr>
			<tr>
				<td>
					Rennovation Costs
					<input type="range" name="rennovation_costs" min="0" max="500000" step="10000" value="0">
				</td>
				<td><span class="scenario-value" id="rennovation_costs"></span></td>
				<td><span>$0</span></td>
			</tr>
			<tr>
				<td>
					Finance Renovation Costs
					<input type="checkbox" name="finance_renovation_costs">
				</td>
				<td><span class="scenario-value" id="finance_renovation_costs"></span></td>
				<td><span>No</span></td>
			</tr>
			<tr>
				<td>
					Rent
					<input type="range" name="monthly_rent" min="{{ $listing->calculated_fields[0]->operating_profit_and_loss->monthly->revenue * 0.5 }}" max="{{ $listing->calculated_fields[0]->operating_profit_and_loss->monthly->revenue * 1.5 }}" value="{{ $listing->calculated_fields[0]->operating_profit_and_loss->monthly->revenue }}" step="100">
				</td>
				<td><span class="scenario-value" id="monthly_rent"></span></td>
				<td><span>{{ formatLargeCurrency($listing->calculated_fields[0]->operating_profit_and_loss->monthly->revenue, 0) }}</span></td>
			</tr>
			<tr>
				<td>
					Downpayment Percentage
					<input type="range" name="downpayment_percentage" min="0" max="1" value="{{ $listing->calculated_fields[0]->settings_used->downpayment }}" step="0.01">
				</td>
				<td><span class="scenario-value" id="downpayment_percentage"></span></td>
				<td><span>{{ formatPercentage($listing->calculated_fields[0]->settings_used->downpayment) }}</span></td>
			</tr>
			<tr>
				<td>
					Opex_percentage
					<input type="range" name="Opex_percentage" min="0" max="1" value="{{ $listing->calculated_fields[0]->settings_used->operational_expenses }}" step="0.01">
				</td>
				<td><span class="scenario-value" id="Opex_percentage"></span></td>
				<td><span>{{ formatPercentage($listing->calculated_fields[0]->settings_used->operational_expenses) }}</span></td>
			</tr>
			<tr>
				<td>
					Interest Rate
					<input type="range" name="interest_rate" min="0" max="0.3" value="0.06" step="0.01">
				</td>
				<td><span class="scenario-value" id="interest_rate"></span></td>
				<td><span>6.0%</span></td>
			</tr>
		</form>
	</table>


	</div>
</div>

