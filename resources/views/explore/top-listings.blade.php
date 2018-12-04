<div class="col-md-6">

    <div class="box box-default">
      <div class="box-body">

        <h4>10 best Cash on Cash</h4> 

        @if (isset($zip[0]->calculated_fields->best_listings->by_cash_on_cash))

          <table class="table table-hover">
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
                <td><a target="_Blank" href="/listings/details?id={{ $coc_listing->id }}&type=sell"> {{ $coc_listing->address }} </a></td> 
                <td>{{ $coc_listing->beds }}</td> 
                <td>{{ formatPercentage($coc_listing->cash_on_cash, 1) }}</td> 
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

          <table class="table table-hover">
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
                <td><a target="_Blank" href="/listings/details?id={{ $coc_listing->id }}&type=sell"> {{ $coc_listing->address }} </a></td> 
                <td>{{ $coc_listing->beds }}</td> 
                <td>{{ formatPercentage($coc_listing->cap_rate, 1) }}</td> 
              </tr>
          
          @endforeach
          </tbody>
          </table>

        @endif

      
      </div>
    </div>

  </div>
  

