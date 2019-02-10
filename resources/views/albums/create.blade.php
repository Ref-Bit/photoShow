@extends('layouts.app')

@section('content')

        <h3>Create Album</h3>

    {!! Form::open(['method'=>'POST', 'action'=>'AlbumsController@store', 'enctype'=>'multipart/form-data']) !!}
            {{ Form::text('name', '', ['placeholder'=>'Album Name']) }}
            {{ Form::textarea('description','',['placeholder'=>'Album Description']) }}
            {{ Form::file('cover_image')}}
            {{ Form::submit('Store Image',['class'=>'hollow button primary']) }}
    {!! Form::close() !!}

@endsection
