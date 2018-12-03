<div class="box box-default">
  <div class="box-body">
    
    <h4>Actions</h4>

    <button id="explore-details-recalc-all-stats" type="button" class="btn btn-default">Recalc all stats</button>

    <div class="btn-group">
        <button type="button" class="btn btn-default" data-zip={{$zip[0]->details->zip}}>API Calls</button>
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