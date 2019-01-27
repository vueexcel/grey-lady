
@extends('layouts.app')


@section('content')


<div class="box box-default">
  <div class="box-body">

      <h3>Latest Version</h3>

      <p>Here's a link to the latest version of the plugin. If you don't know how to install the plugin, here's a <a href="/chrome-extension-download-instructions">link to instructions</a></p>

      <p style="width: 400px"><a target="_blank" href="https://drive.google.com/file/d/1STaTZoPu1_BmWvs8K9tFpnQwfnELoWDE/view" type="submit" class="btn btn-primary btn-block btn-flat">Download New Version</a></p>

  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->


<div class="box box-default">
  <div class="box-body">

      <h3>Older Builds</h3>

      <ul>
        <li>0.1.1 - <a href="https://drive.google.com/file/d/1cxMA7CaZedZrViE1W8LOBckmFw0ExS-i/view?usp=sharing">Drive Download</a></li>
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