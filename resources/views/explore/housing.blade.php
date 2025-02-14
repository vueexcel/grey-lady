{{-- <div class="row"> --}}


@if ( isset( $zip[0]->details->housing ) && !empty( (array) $zip[0]->details->housing ) )

  <div class="box box-default">
    <div class="box-body">
      
      <h4>Overview</h4>

      @if ( isset( $zip[0]->details->housing ) )
      

        <div class="row">


          @if ( isset( $zip[0]->details->housing->population ) )
            <div class="col-sm-3 col-xs-6">
              <div class="description-block">
                <h5 class="description-header">{{ formatLargeNumber($zip[0]->details->housing->population) }}</h5>
                <span class="description-text">Population</span>
              </div>
            </div>

          @endif


          @if ( isset( $zip[0]->details->housing->housing_units ) )
            
            <div class="col-sm-3 col-xs-6">
              <div class="description-block">
                <h5 class="description-header">{{ formatLargeNumber($zip[0]->details->housing->housing_units) }}</h5>
                <span class="description-text">Housing</span>
              </div>
            </div>

          @endif


          @if ( isset( $zip[0]->details->housing->occupied_units ) && isset( $zip[0]->details->housing->housing_units ) )

            <div class="col-sm-3 col-xs-6">
              <div class="description-block">
                <h5 class="description-header">{{ formatPercentage($zip[0]->details->housing->occupied_units/$zip[0]->details->housing->housing_units) }}</h5>
                <span class="description-text">Occupied</span>
              </div>
            </div>

          @endif

          @if ( isset( $zip[0]->details->housing->renter_occupied_housing_units ) && isset( $zip[0]->details->housing->housing_units ) )

            <div class="col-sm-3 col-xs-6">
              <div class="description-block">
                <h5 class="description-header">{{ formatPercentage($zip[0]->details->housing->renter_occupied_housing_units/$zip[0]->details->housing->housing_units) }}</h5>
                <span class="description-text">Renter</span>
              </div>
            </div>

          @endif

      </div>

    @endif

    @if ( isset( $zip[0]->details->income->median_income ) && isset( $zip[0]->details->income->mean_income ) )

      <div class="row">
        
        <div class="col-sm-3 col-xs-6">
          <div class="description-block">
            <h5 class="description-header">{{ formatLargeCurrency($zip[0]->details->income->median_income) }}</h5>
            <span class="description-text">Med Income</span>
          </div>
        </div>

        <div class="col-sm-3 col-xs-6">
          <div class="description-block">
            <h5 class="description-header">{{ formatLargeCurrency($zip[0]->details->income->mean_income) }}</h5>
            <span class="description-text">Mean Income</span>
          </div>
        </div>
        
      </div>

    @endif


    </div>
  </div>

@endif

{{-- </div> --}}

