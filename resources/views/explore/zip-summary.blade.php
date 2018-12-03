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
              <td>{{ formatLargeCurrency($bed_zip_stats->average_price) }}</td> 
              <td>{{ number_format($bed_zip_stats->average_baths, 1) }}</td> 
              <td>{{ number_format($bed_zip_stats->average_sqft,0) }}</td> 
              <td>{{ formatPercentage($bed_zip_stats->average_cap_rate) }}</td> 
              <td>{{ formatPercentage($bed_zip_stats->average_cash_on_cash) }}</td> 
              <td> {{ formatLargeCurrency($bed_zip_stats->average_revenue) }}</td> 
              <td>{{ $bed_zip_stats->number_of_listings }}</td> 
            </tr>
          
          @endforeach

          </tbody>
          </table>

        @endif  

      </div>
    </div>