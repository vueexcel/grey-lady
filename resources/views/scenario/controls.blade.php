<div class="box box-default">
	<div class="box-body">

		<h4>Scenario Controls</h4>

		{{-- {{dd($listing)}} --}}

		{{-- https://api.greyladyproject.com/api/v1/scenario?listing_id=5c262da9ebc45ad4a20beb64&monthly_rent=10&downpayment_percentage=0.2&interest_rate=20&Opex_percentage=0.255&purchase_price=100000&rennovation_costs=10000&finance_renovation_costs=true --}}

		<form id="scenario-control">
			<div>
				<label>Purchase Price</label>
				<input type="range" name="purchase_price" min="{{ $listing->details->price * 0.5 }}" max="{{ $listing->details->price * 1.5 }}" value="{{ $listing->details->price }}" step="10000">
				<span class="scenario-value" id="purchase_price"></span>
			</div>
			<div>
				<label>Rennovation Costs</label>
				<input type="range" name="rennovation_costs" min="0" max="500000" step="10000" value="0">
				<span class="scenario-value" id="rennovation_costs"></span>
			</div>
			<div>
				<label>Finance Renovation Costs</label>
				<input type="checkbox" name="finance_renovation_costs">
				<span class="scenario-value" id="finance_renovation_costs"></span>
			</div>
			<div>
				<label>Rent</label>
				<input type="range" name="monthly_rent" min="{{ $listing->calculated_fields[0]->operating_profit_and_loss->monthly->revenue * 0.5 }}" max="{{ $listing->calculated_fields[0]->operating_profit_and_loss->monthly->revenue * 1.5 }}" value="{{ $listing->calculated_fields[0]->operating_profit_and_loss->monthly->revenue }}" step="100">
				<span class="scenario-value" id="monthly_rent"></span>
			</div>
			<div>
				<label>Downpayment Percentage</label>
				<input type="range" name="downpayment_percentage" min="0" max="1" value="{{ $listing->calculated_fields[0]->settings_used->downpayment }}" step="0.01">
				<span class="scenario-value" id="downpayment_percentage"></span>
			</div>
			<div>
				<label>Opex_percentage</label>
				<input type="range" name="Opex_percentage" min="0" max="1" value="{{ $listing->calculated_fields[0]->settings_used->operational_expenses }}" step="0.01">
				<span class="scenario-value" id="Opex_percentage"></span>
			</div>
			<div>
				<label>Interest Rate</label>
				<input type="range" name="interest_rate" min="0" max="1" value="0.06" step="0.01">
				<span class="scenario-value" id="interest_rate"></span>
			</div>

		</form>


	</div>
</div>

