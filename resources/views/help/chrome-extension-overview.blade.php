
@extends('layouts.app')


@section('content')


<div class="box box-default">
  <div class="box-body">
    <div style="overflow: auto">

      <h1>First, what does a Chrome Extension do?</h1>

      <p>It's a Chrome plugin...so, it injects an interface over the web page you are viewing. The plugin opens up (and can be closed) when you are looking at a specific property detail page on real estate websites. For now, those sites are Trulia.com, Zillow.com, Realtor.com, and Redfin.com </p>

      <p>Here's what it looks like: </p>
      <img src="/images/how-to-5.png" width=600>

      <h3>Some key features:</h3>

      <p><b>Close:</b> The close button (next to the Logout button) will collapse the plugin. Open the plugin back up by just clicking on the GreyLady button that will be on the right side of the screen.</p>
      <p><b>Scenario Runner:</b> Clicking the scenario runner button will automatically bring you to the GreyLady app so you can toggle the calculation metrics (i.e. increase/decrease rent).</p>
      <p><b>Save Zip:</b> Click this button to save this Zip in the app.</p>
      <p><b>Save Listing:</b> Click this button to save this specific property in the app</p>
      <p><b>Jump too... :</b> The “Jump too” drop down lets you easily jump to other real estate websites or zip searches. </p>

      <h3>Some Known Problems</h3>

      <ul>
        <li>The plugin will not calculate “Listing Financial” stats if there's not at least 1 rental listings matching the zip and # of bedrooms of the property you are looking at. </li>
        <ul>
          <li>Rental stats are added to the App Database after a rental is clicked on and viewed...overtime, the database will become stronger</li>
        </ul>
        <li>It’s generally buggy. Occasionally, it just doesn't work or it doesn't calculate financial stats (but it's getting better!)...a quick refresh of the page - “Ctrl + R” - usually gives it a jump start to work right.</li>
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

