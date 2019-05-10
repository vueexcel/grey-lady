
@extends('layouts.app')


@section('content')


<div class="box box-default">
  <div class="box-body">
    <div style="overflow: auto">

      <h1>How to Install the Chrome Extension (the Plugin):</h1>

      <p>1. Use <a href="/plugin/latest">this link to download</a> the latest zip file to your computer.</p>

      <p>2. Once you have your folder saved on the desktop, go to chrome://extensions (or find it in your menu in more tools > extensions), then activate the developer mode on the top right corner of the page:</p>

      <img src="/images/how-to-1.png" width=600>

      <p>3. To install the extension, you next have to indicate where it is on your computer.</p>

      <p>a) Click on the “Load unpacked” button near the top left of the page:</p>

      <img src="/images/how-to-2.png" width=600>

      <p>b) Find the file “greylady-plugin” and select that folder</p>
      <p>c) It should look like this when you click the “select folder” button:</p>

      <img src="/images/how-to-3.png" width=600>

      <p>4. When completed, your page should look like the picture below, with the plugin now loaded into your chrome extensions:</p>

      <img src="/images/how-to-4.png" width=600>

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

