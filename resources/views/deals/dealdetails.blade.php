@extends('layouts.app')

@section('page-title')

<div>
    <h3 data-step="1" data-intro="This is a tooltip!">Deals > {{json_decode($deal, true)[0]['name']}}</h3>
  </div>
@endsection


@section('content')
<div id="app">
    <detail-component :deal="{{ $deal }}" :scenario="{{ $scenarios }}"/>
</div>

@endsection