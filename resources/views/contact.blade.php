<!-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
		<body>
			<div class="container">
				<h1>Contact Page</h1>
			</div>
		</body>
</html> -->

@extends('layouts.app')

@section('content')
	<h1> Contact Page</h1>
		@if (count($people))
			@foreach($people as $person)
				<li>{{$person}}</li>
			@endforeach
		@endif

@stop

@section('footer')
<!-- <script>alert('Hello Visitor')</script> -->
@stop