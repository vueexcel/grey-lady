<div class="box box-default collapsed-box">
  <div class="box-header with-border">
    <h3 class="box-title">Watchlist</h3>

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
      @if (isset($zip[0]->watchlist->sell))

        <ul>

        @foreach ($zip[0]->watchlist->sell as $key => $sell_item)

          <li><b>{{ $key }}:</b> {{ $sell_item }}</li>
        
        @endforeach

        </ul>

      @else 
        - Nothing

      @endif  
  </div>
  <!-- /.box-body -->
</div>