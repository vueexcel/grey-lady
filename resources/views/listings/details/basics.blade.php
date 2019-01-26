<div class="box box-default">
	<div class="box-body">


		<h4>Basic Details</h4>

    {!! formatPropertyDetailsBlock( $listing->details->purchaseType, 'Purchase Type' ) !!}
    {!! formatPropertyDetailsBlock( $listing->details->beds, 'Beds' ) !!}
    {!! formatPropertyDetailsBlock( $listing->details->baths, 'Baths' ) !!}
    {!! formatPropertyDetailsBlock( formatLargeCurrency($listing->details->price), 'Price' ) !!}
    <div class="row"></div>
    {!! formatPropertyDetailsBlock( $listing->details->propertyType, 'Property Type' ) !!}
    {!! formatPropertyDetailsBlock( $listing->details->livingArea, 'Sqft' ) !!}
    
		
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
    {!! formatPropertyDetailsBlock( $listing->details->propertyTax, 'Monthly Property Tax' ) !!}
    {!! formatPropertyDetailsBlock( $listing->details->AssociationFee, 'Monthly Assoc. Fee' ) !!}

  </div>
</div>