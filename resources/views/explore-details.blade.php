
@extends('layouts.app')


@section('content')

<div id="message-area"></div>

<div class=" col-md-8">
  
  <div class="box box-default">
    <div class="box-body">

      <h4>Beds vs Cap Rate</h4>

      @if (isset($zip[0]->calculated_fields->by_beds))

        @foreach ($zip[0]->calculated_fields->by_beds as $bed => $bed_zip_stats)

          <div class="precentage">
            <span class="precentage-top">{{ number_format($bed_zip_stats->average_cap_rate, 2) }}</span>
            <span class="precentage-bottom">{{ $bed }}b</span>
          </div>
        
        @endforeach

      @endif  
    
    </div>
  </div>
{{-- 
  <div class="box box-default">
    <div class="box-body">

      Listings datatable
    
    </div>
  </div> --}}

  <div class="col-md-6">

    <div class="box box-default">
      <div class="box-body">

        <h4>10 best Cash on Cash</h4> 

        @if (isset($zip[0]->calculated_fields->best_listings->by_cash_on_cash))

          <table>
            <thead>
                <tr>
                    <th>Address</th>
                    <th>Beds</th>
                    <th>CoC</th>
                </tr>
            </thead>
            <tbody>
          @foreach ($zip[0]->calculated_fields->best_listings->by_cash_on_cash as $coc_listing)

              <tr>
                {{-- <th>{{ $coc_listing->id }}</th> --}}
                <td>{{ $coc_listing->address }}</td> 
                <td>{{ $coc_listing->beds }}</td> 
                <td>{{ number_format($coc_listing->cash_on_cash, 2) }}</td> 
              </tr>
          
          @endforeach
          </tbody>
          </table>

        @endif
      
      </div>
    </div>

  </div>

  <div class="col-md-6">
    <div class="box box-default">
      <div class="box-body">

        <h4>10 Best Cap Rate</h4> 
        
        @if (isset($zip[0]->calculated_fields->best_listings->by_cap_rate))

          <table>
            <thead>
                <tr>
                    <th>Address</th>
                    <th>Beds</th>
                    <th>Cap</th>
                </tr>
            </thead>
            <tbody>
          @foreach ($zip[0]->calculated_fields->best_listings->by_cap_rate as $coc_listing)

              <tr>
                {{-- <th>{{ $coc_listing->id }}</th> --}}
                <td>{{ $coc_listing->address }}</td> 
                <td>{{ $coc_listing->beds }}</td> 
                <td>{{ number_format($coc_listing->cap_rate, 2) }}</td> 
              </tr>
          
          @endforeach
          </tbody>
          </table>

        @endif

      
      </div>
    </div>

  </div>
  

</div>


<div class=" col-md-4">
  
  <div class="box box-default">
    <div class="box-body">
      
      <h4>Actions</h4>

      <div class="btn-group">
          <button type="button" class="btn btn-default">API Calls</button>
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li><a target="_Blank" href="//gulshan.app.greyladyproject.com/api/v1/watchlist?zip={{ $zip[0]->details->zip }}">Search Watchlists</a></li>
            <li><a target="_Blank" href="//gulshan.app.greyladyproject.com/api/v1/report?zip={{ $zip[0]->details->zip }}">Average Rent</a></li>
            <li><a target="_Blank" href="//gulshan.app.greyladyproject.com/api/v1/listings?type=sell&amp;zip={{ $zip[0]->details->zip }}">Listing Sell Search</a></li>
            <li><a target="_Blank" href="//gulshan.app.greyladyproject.com/api/v1/listings?type=rent&amp;zip={{ $zip[0]->details->zip }}">Listing Rent Search</a></li>
            <li><a target="_Blank" href="//gulshan.app.greyladyproject.com/api/v1/recalculate/listings?zip={{ $zip[0]->details->zip }}">Recalculate Zip Listings</a></li>
            <li><a target="_Blank" href="//gulshan.app.greyladyproject.com/api/v1/recalculate/zips?zip={{ $zip[0]->details->zip }}">Recalculate Zip</a></li>
            <li><a target="_Blank" href="//gulshan.app.greyladyproject.com/api/v1/zip?zip={{ $zip[0]->details->zip }}">Zip Details</a></li>
          </ul>
        </div>

    </div>
  </div>

  <div class="box box-default">
    <div class="box-body">
      
      <h4>Zip Summary</h4>

{{--   
          1: {
          average_price: 133500,
          average_baths: null,
          average_sqft: null,
          average_cap_rate: 0.08293878403744807,
          average_cash_on_cash: 0.015829370917824454,
          average_rent_to_value: 0.00921542044860534,
          average_debt_coverage_ratio: null,
          average_revenue: null,
          number_of_listings: 4
}, --}}

      @if (isset($zip[0]->calculated_fields->by_beds))

        <table>
          <thead>
              <tr>
                  <th>Price</th>
                  <th>Baths</th>
                  <th>Sqft</th>
                  <th>Cap</th>
                  <th>CoC</th>
                  <th>r2v</th>
                  <th>rent</th>
                  <th># listings</th>
              </tr>
          </thead>
          <tbody>

        @foreach ($zip[0]->calculated_fields->by_beds as $bed => $bed_zip_stats)

          <tr>
            {{-- <th>{{ $coc_listing->id }}</th> --}}
            <td>{{ $bed_zip_stats->average_price }}</td> 
            <td>{{ $bed_zip_stats->average_baths }}</td> 
            <td>{{ $bed_zip_stats->average_sqft }}</td> 
            <td>{{ $bed_zip_stats->average_sqft }}</td> 
            <td>{{ number_format($bed_zip_stats->average_cap_rate, 2) }}</td> 
            <td>{{ number_format($bed_zip_stats->average_cash_on_cash, 2) }}</td> 
            <td>{{ number_format($bed_zip_stats->average_rent_to_value, 2) }}</td> 
            <td>{{ $bed_zip_stats->average_revenue }}</td> 
            <td>{{ $bed_zip_stats->number_of_listings }}</td> 
          </tr>
        
        @endforeach

        </tbody>
        </table>

      @endif  

    </div>
  </div>

  <div class="box box-default">
    <div class="box-body">
      
      <h4>Housing</h4>

      @if (isset($zip[0]->details->housing))

        <ul>

        @foreach ($zip[0]->details->housing as $key => $housing_stat)

          <li><b>{{ $key }}:</b> {{ $housing_stat }}</li>
        
        @endforeach

        </ul>

      @endif  

    </div>
  </div>

  <div class="box box-default">
    <div class="box-body">
      
      <h4>Income</h4>

      @if (isset($zip[0]->details->income))

        <ul>

        @foreach ($zip[0]->details->income as $key => $income_stat)

          <li><b>{{ $key }}:</b> {{ $income_stat }}</li>
        
        @endforeach

        </ul>

      @endif  

    </div>
  </div>

  <div class="box box-default">
    <div class="box-body">
      
      Education

      @if (isset($zip[0]->details->education))

        <ul>

        @foreach ($zip[0]->details->education as $key => $education_stat)

          <li><b>{{ $key }}:</b> {{ $education_stat }}</li>
        
        @endforeach

        </ul>

      @endif  

    </div>
  </div>


</div>

<div class="col-md-12 row"> 
  <div class="box box-default">
    <div class="box-body">
      {{ var_dump($zip[0]) }}
    </div>
  </div>
</div>




@endsection


@section('footer-scripts')

  <!-- page script -->
  <script type="text/javascript"></script>


  <script src="/js/zips.js"></script>

@endsection 



@section('header-scripts')



@endsection 



@section('page-title')

<h3>Explore > {{ $zip[0]->details->zip }}</h3>

@endsection