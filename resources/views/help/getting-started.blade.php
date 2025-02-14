
@extends('layouts.app')


@section('content')


<div class="box box-default">
  <div class="box-body">
    <div style="overflow: auto">

      <h1>Welcome!</h1>

      <h3>First, the purpose:</h3>

      <p>This app is designed to help real estate investors find zip codes that could be attractive places to invest in so they don't need to manually research each one.</p>

      <h3>Next, some very quick instructions on how to get started:</h3>

      <ul>
        <li>Click around on the listing data collected zips in <a href="/explore?town=worcester">Worcester</a> and <a href="/explore?town=Boston">Boston</a>. Those are the only that work now. More to come in the future.</li>
        <li><a href="/chrome-extension-download-instructions">Download the chrome plugin</a> (only works on Redfin).</li>
      </ul>

      <h3>Known Problems</h3>

      <ul>
        <li>A lot. Would help if you reported them as you found them... = )</li>
      </ul>

    </div>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->

@endsection


@section('footer-scripts')


@endsection 



@section('header-scripts')

  <style type="text/css">
    h3 {
      margin-top: 40px;
    }
    p {
      font-size: 18px;
      margin-bottom: 20px;
    }
    ul {
      font-size: 18px;  
    }
    
  </style>

@endsection 

