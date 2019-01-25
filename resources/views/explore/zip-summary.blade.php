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

          <table class="table table-hover">
            <thead>
                <tr>
                    <th>Bed</th>
                    <th>Price</th>
                    <th>Baths</th>
                    <th>Sqft</th>
                    <th>Cap</th>
                    <th>CoC</th>
                    <th>rent</th>
                    <th># listings</th>
                </tr>
            </thead>
            <tbody>

          @foreach ($zip[0]->calculated_fields->by_beds as $bed => $bed_zip_stats)

            <tr>
              <td>{{ $bed }}</td> 
              
              @if ( property_exists($bed_zip_stats, "average_price") )
                <td>{{ formatLargeCurrency($bed_zip_stats->average_price) }}</td> 
              @else 
                 <td>-</td> 
              @endif

              @if ( property_exists($bed_zip_stats, "average_baths") )
                <td>{{ number_format($bed_zip_stats->average_baths, 1) }}</td> 
              @else 
                 <td>-</td> 
              @endif

              @if ( property_exists($bed_zip_stats, "average_sqft") )                              
                <td>{{ number_format($bed_zip_stats->average_sqft,0) or 0 }}</td>
              @else 
                 <td>-</td> 
              @endif

              @if ( property_exists($bed_zip_stats, "average_cap_rate") )
                <td>{{ formatPercentage($bed_zip_stats->average_cap_rate) }}</td> 
              @else 
                 <td>-</td> 
              @endif

              @if ( property_exists($bed_zip_stats, "average_cash_on_cash") )
                <td>{{ formatPercentage($bed_zip_stats->average_cash_on_cash) }}</td> 
              @else 
                 <td>-</td> 
              @endif

              @if ( property_exists($bed_zip_stats, "average_revenue") )
                <td> <a target="_blank" href="/listings?zip={{$zip[0]->details->zip}}&minBed={{$bed}}&maxBed={{$bed}}&type=rent"> {{ formatLargeCurrency($bed_zip_stats->average_revenue) }}</a></td> 
              @else 
                 <td>-</td> 
              @endif
              
              @if ( property_exists($bed_zip_stats, "number_of_listings") )
                <td> <a target="_blank" href="/listings?zip={{$zip[0]->details->zip}}&maxBed={{$bed}}&minBed={{$bed}}&type=sell">{{ $bed_zip_stats->number_of_listings }}</a></td> 
              @else 
                 <td>-</td> 
              @endif
            </tr>
          
          @endforeach

          </tbody>
          </table>

        @endif  

      </div>
    </div>