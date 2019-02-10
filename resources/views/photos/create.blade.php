@extends('layouts.app')

@section('content')

    <h3>Upload Photo</h3>

    {!! Form::open(['method'=>'POST', 'action'=>'PhotosController@store', 'enctype'=>'multipart/form-data']) !!}
    {{ Form::text('title', '', ['placeholder'=>'Photo Title']) }}
    {{ Form::textarea('description','',['placeholder'=>'Photo Description']) }}
    {{Form::hidden('album_id', $album_id)}}
    {{ Form::file('photo')}}
    {{ Form::submit('Save Image',['class'=>'hollow button primary']) }}
    {!! Form::close() !!}

@endsection
