@extends('layouts.app')

@section('page-title')

  <div>
    <h3>Dashboard</h3>
    <?php 
      // print_r(gettype($news));
      // $stream = json_encode($stream)
      // echo $stream;
    ?>
  </div>


@endsection


@section('content')
<?php
// print_r($streamData) 
?>
    <div id="app">
      <dashboard-component  :data="{{ $stream }}" :news="{{ $news }}"/>
    </div>

@endsection
