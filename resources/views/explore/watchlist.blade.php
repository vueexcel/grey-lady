<div class="box box-default collapsed-box">
  <div class="box-header with-border">
    <h3 class="box-title">Dump of Watchlist, Income and Education</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
      </button>
    </div>
    <!-- /.box-tools -->
  </div>
  <!-- /.box-header -->
  <div class="box-body" style="display: none;">
       Rental - 
      @if (isset($zip[0]->watchlist->rent))

        <ul>

        @foreach ($zip[0]->watchlist->rent as $key => $rental_item)

          <li><b>{{ $key }}:</b> {{ $rental_item }}</li>
        
        @endforeach

        </ul>

      @endif  

      Sale 
      @if ( isset($zip[0]->watchlist->sell) )

        <ul>

        @foreach ($zip[0]->watchlist->sell as $key => $sell_item)

          <li><b>{{ $key }}:</b> {{ $sell_item }}</li>
        
        @endforeach

        </ul>

      @else 
        - Nothing

      @endif  

      <h4>Housing</h4>

      <ul>
        @foreach ($zip[0]->details->housing as $key => $housing_stat)
          <li><b>{{ $key }}:</b> {{ $housing_stat }}</li>
        @endforeach
      </ul>

      <h4>Income</h4>

      <ul>
        @foreach ($zip[0]->details->income as $key => $income_stat)
          <li><b>{{ $key }}:</b> {{ $income_stat }}</li>
        @endforeach
      </ul>
  </div>
  <!-- /.box-body -->
</div>