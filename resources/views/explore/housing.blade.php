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