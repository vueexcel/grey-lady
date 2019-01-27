
@extends('layouts.app')


@section('content')


<div class="box box-default">
  <div class="box-body">
    <div style="overflow: auto">

      <h1>Downloading the Chrome Extension</h1>

      <h3>What does it do?</h3>

      <p>It's a chrome plguin. It injects an interface when looking at property detail pages on real estate websites (just redfin for now). The interface gives you financial stats like cap rate, cashflow, etc.. as well as cencus information about the zip code. </p>

      <p> The financial calculations are crude right now. It's using average rent for listings matching zip and bedroom to calculate revenue and a % to calculate operating expenses. In the future we'll make it smarter, give inputs to changes the assumptions, etc..</p>

      <p>Here's what it looks like:</p>
      <img width=1000px src="/images/chrome-plugin.jpeg">

      <h3>Installation Instructions</h3>

      <ul>
        <li>Download the <a href="http://greylady-app.test/chrome-extension-download-instructions/latest">latest version here</a>. It's permission controlled by google right now. You might need to request access to it.</li>
        <li>Follow the instructions <a href="https://blog.hunter.io/how-to-install-a-chrome-extension-without-using-the-chrome-web-store-31902c780034">in this article</a> under <b>"Method 1"</b></li>
      </ul>

      <h3>Known Problems</h3>

      <ul>
        <li>It doesn't work on Zillow, Realtor.com or Trulia.com. Working on this now.</li>
        <li>It wont calculate financial stats if there's not at least 5 rental listings matching the zip / bedroom of the listing you are looking at. This is because it uses those 5 to calculate an average rent in that bed / zip.</li>
        <li>It hasn't been tested for different property types. It doesn't work for land or multifamily.</li>
        <li>Its generally bugy. Sometimes it just doesn't work or it doesn't calculate financail stats. </li>
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

