@extends('bug-reporter.base')

@section('title')
	<h4 class="modal-title">Fill out the form below to report a bug:</h4>
@endsection

@section('body')
	
	<p>What I was expecting to happen:</p>
	<textarea id='expecting'></textarea>

	<p>Here's what did happen: </p>
	<textarea id='happened'></textarea>

    <p>Here's the request made to the API:</p>
	<span class="code-snippet short" id="request" style="overflow: auto"></span>

	<p>Here's the response from the API:</p>	
	<span class="code-snippet short" id="response" style="overflow: auto"></span>

	<span id="report-to-send" class="hidden-but-visible"></span>

@endsection

@section('buttons')
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button id="copy-and-close" data-clipboard-target="#report-to-send" type="button" class="btn btn-primary bug-reporter-button">Copy and Close</button>
@endsection