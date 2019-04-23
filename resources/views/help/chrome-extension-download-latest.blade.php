
@extends('layouts.app')


@section('content')


<div class="box box-default">
  <div class="box-body">

      <h3>Latest Version</h3>

      <p>Here's a link to the latest version of the plugin. If you don't know how to install the plugin, here's a <a href="/chrome-extension-download-instructions">link to instructions</a>. Here's what's new:</p>

      <ul>
        <li>Major update to handle Chrome's new(ish) CORS standards. Was a breaking change for the plugin.</li>
        <li>New parser for Zillow. Appears like they had an A/B test going. Which changed PDP HTML structure. Only tested it on for sale listings. Multis / rentals likely don't work.</li>
        <li>Direct linking to the scenario tool back in the app for faster access.</li>
        <li>Better error handling / messaging for common cases like not authed in app, etc..</li>
        <li>Few minor UI tweaks / bug fixes.</li>
      </ul>

      <p style="width: 400px"><a target="_blank" href="https://drive.google.com/file/d/1ys_V3i0NuWopAddK0HTfXI6M4iN8uBUw/view" type="submit" class="btn btn-primary btn-block btn-flat">Download New Version - v0.1.4</a></p>


  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->


<div class="box box-default">
  <div class="box-body">

      <h3>Older Builds</h3>

      <ul>
        <li>0.1.3 - <a href="https://drive.google.com/file/d/1-he2Nh44MXjuDpwDhL75a9Gjd_EBBPzi/view?usp=sharing">Drive Download</a> - Release notes:
        <ul>
              <li>Rentals work on all supported websites: Zillow, Trulia and Realtor.com (not redfin)</li>
              <li>Plugin will alert you when there's a new version available.</li>
              <li>More useful linking back into the app for easier navigation of zip code / listing data.</li>
              <li>Warning screen appears when listing can't be parsed rather than just failing silently.</li>
              <li>Chrome plugin will now report back listing pages it can't parse so we can more easily see errors.</li>
              <li>lots of little tweaks and bug fixes.</li>
            </ul>
        </li>
      
        <li>0.1.2 - <a href="https://drive.google.com/file/d/1STaTZoPu1_BmWvs8K9tFpnQwfnELoWDE/view?usp=sharing">Drive Download</a> - For sale listings worked for all major portals, financial stats appeared, zip stats appeared.</li>
        <li>0.1.1 - <a href="https://drive.google.com/file/d/1cxMA7CaZedZrViE1W8LOBckmFw0ExS-i/view?usp=sharing">Drive Download</a> - First shared version. Basic interface, only worked for redfin listings.</li>
      </ul>

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