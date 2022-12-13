@extends('layouts.app')

@section('content')
<h1>Edit Post</h1>

{!! Form::model($post, ['method'=>'PATCH', 'route'=>['posts.update', $post->id]]) !!}
    {{csrf_field()}}
    <!-- <div class='form-group'> -->
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
    <!-- </div>
    
    <div class='form-group'> -->
        {!! Form::submit('Update Post', ['class'=>'btn btn-info']) !!}
<!-- </div> -->

{{ Form::close() }}

{!! Form::open(['method'=>'DELETE', 'route'=>['posts.destroy', $post->id]]) !!}
    {{csrf_field()}}

    {!! Form::submit('Delete Post', ['class'=>'btn btn-danger']) !!}
{{ Form::close() }}

<!-- <form method="post" action="/posts/{{$post->id}}">
    {{csrf_field()}}    
    <input type="hidden" name="_method" value="PUT">
    <input type="text" name="title" placeholder="Enter Title" value="{{$post->title}}">
    <input type="submit" name="submit" value="UPDATE">
</form> -->
<!-- <form method="post" action="/posts/{{$post->id}}">
    {{csrf_field()}}    
    <input type="hidden" name="_method" value="DELETE">
    <input type="submit" value="DELETE">

</form> -->
@stop