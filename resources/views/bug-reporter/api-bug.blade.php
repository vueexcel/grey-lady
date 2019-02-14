@extends('bug-reporter.base')

@section('title')
	<h4 class="modal-title">Fill out the form below to report a bug:</h4>
@endsection

@section('body')
	
    <p>Request</p>
	<span class="code-snippet short" id="request" style="overflow: auto"></span>


	<p>Response</p>	
	<span class="code-snippet short" id="response" style="overflow: auto"></span>

@endsection

