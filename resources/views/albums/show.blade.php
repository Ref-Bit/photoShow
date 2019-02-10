@extends('layouts.app')

@section('content')
    <h1>{{$album->name}}</h1>
    <a href="/" class="button secondary">Go Back</a>
    <a href="/photos/create/{{$album->id}}" class="button">Upload to Album</a>
    <hr>


    @if(count($album->photos)>0)
    <?php
    $colCount = count($album->photos);
    $i = 1;
    ?>

    <div id="photos">
        <div class="grid-x grid-margin-x text-center">
            @foreach($album->photos as $photo)
                @if($i == $colCount)
                    <div class="columns medium-4 medium-offset-1 end" style="width: 350px">
                        <a href="/photos/{{$photo->id}}">
                            <img class="thumbnail" src="/storage/Photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->title}}"></a>
                        <h4>{{$photo->title}}</h4>

                        @else
                            <div class="columns medium-4 medium-offset-1 end" style="width: 350px">
                                <a href="/photos/{{$photo->id}}">
                                    <img class="thumbnail" src="/storage/Photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->title}}"></a>
                                <h4>{{$photo->title}}</h4>
                                @endif

                                @if($i%3 == 0)
                            </div></div>
                    <div class="grid-x grid-margin-x text-center">
                        @else
                    </div>
                @endif
                @php($i++)
            @endforeach
        </div>
    </div>
    @else
        <p>No Photos To Display...</p>
    @endif

@endsection