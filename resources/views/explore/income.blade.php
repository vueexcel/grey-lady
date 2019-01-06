<div class="box box-default">
  <div class="box-body">
    
    <h4>Income</h4>

    @if ( isset($zip[0]->details->income) && !empty( (array) $zip[0]->details->income) )

      <ul>

      @foreach ($zip[0]->details->income as $key => $income_stat)

        <li><b>{{ $key }}:</b> {{ $income_stat }}</li>
      
      @endforeach

      </ul>

    @else 

      <p>No income data available</p>

    @endif  

  </div>
</div>