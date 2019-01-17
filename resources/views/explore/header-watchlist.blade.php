<div class="box box-default">
  <div class="box-body">
    
    <h4>Download History</h4>

    <div class="header-rental-section">

      @if ($zip[0]->watchlist->rent && isset($zip[0]->watchlist->rent->lastCrawl) && isset($zip[0]->watchlist->rent->number_of_listings) )

        Rent - {{ $zip[0]->watchlist->rent->lastCrawlFormatted }}, {{ $zip[0]->watchlist->rent->number_of_listings }} listings
      @else
        <span>Rent - </span><span>hasn't run yet</span>
      @endif
    </div>
    <div class="header-sell-section">
      @if ($zip[0]->watchlist->sell && isset($zip[0]->watchlist->sell->lastCrawl) && isset($zip[0]->watchlist->sell->number_of_listings) )
        Sell - {{ $zip[0]->watchlist->sell->lastCrawlFormatted }}, {{ $zip[0]->watchlist->sell->number_of_listings }} listings
      @else
        <span>Sell - </span><span>hasn't run yet</span>
      @endif
      
    </div>
  </div>
</div>