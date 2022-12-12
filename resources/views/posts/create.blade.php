@extends('layouts.app')

@section('content')
<h1>Create Post</h1>
<!-- <form method="post" action="/posts"> -->
{!! Form::open() !!}
    <input type="text" name="title" placeholder="Enter Title">
    {{csrf_field()}}
    <input type="submit" name="submit">
{{ Form::close() }}
@stop