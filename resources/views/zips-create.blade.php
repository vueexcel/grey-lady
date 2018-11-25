
@extends('layouts.app')


@section('content')

          <!-- Title -->
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"> Create New Zips </h3>
            </div>
            <div class="box-body" id="new-zips-form"></div>
          </div>
  
          </div>

@endsection


@section('footer-scripts')

<script type="text/javascript">
  
  $(function () {

      setUpCreateObject('zips', 'create', '#new-zips-form');

  });


</script>

@endsection 



@section('header-scripts')


  

@endsection 