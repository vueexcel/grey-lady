
@extends('layouts.app')


@section('content')

          <!-- Title -->
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"> Create New Listing </h3>
            </div>
            <div class="box-body" id="new-listing-form"></div>
          </div>
  
          </div>

@endsection


@section('footer-scripts')

<script type="text/javascript">
  
  $(function () {

      setUpCreateObject('listings', 'create', '#new-listing-form');

  });


</script>

@endsection 



@section('header-scripts')


  

@endsection 