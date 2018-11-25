
@extends('layouts.app')


@section('content')

          <!-- Title -->
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"> Create New Watchlist </h3>
            </div>
            <div class="box-body" id="new-watchlist-form"></div>
          </div>
  
          </div>

@endsection


@section('footer-scripts')

<script type="text/javascript">
  
  $(function () {

      setUpCreateObject('watchlists', 'create', '#new-watchlist-form');

  });


</script>

@endsection 



@section('header-scripts')


  

@endsection 