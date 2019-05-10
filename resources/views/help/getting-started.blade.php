
@extends('layouts.app')


@section('content')


<div class="box box-default">
  <div class="box-body">
    <div style="overflow: auto">

      <h1>Welcome!</h1>

      <h3>The purpose of GreyLady:</h3>

      <p>This app is designed to help real estate investors quickly analyze properties and zips that could be attractive places to invest in, so they don't waste time manually diligencing each one.</p>

      <p>The app is primarily driven by a chrome extension, aka the plugin. The plugin allows you to quickly review properties, easily add those properties and/or zip codes to the app, and then do some analytic and financial analysis on them.</p> 

      <h3>Instructions on how to get started:</h3>

      <ul>
        <li>What you will need...</li>
        <ul>
          <li><a href="https://www.google.com/chrome/">Google Chrome</a></li>
          <li>The Chrome Plugin. Download the latest version - <a href="/plugin/latest">Here</a>. Instructions on installing the Plugin to your Chrome browser - <a href="/plugin/instructions">Here</a>.</li>
          <li>Join our Slack Chat channel so you can give us feedback on the product. Message Bart to get an invite.</li>
        </ul>
      </ul>


      <h3>Known Problems:</h3>

      <ul>
        <li>A fair amount. Would help if you reported them as you found them... </li>
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

