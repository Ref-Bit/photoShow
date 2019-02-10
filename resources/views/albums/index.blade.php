@extends('layouts.app')

@section('content')

@if(count($albums)>0)
<?php
$colCount = count($albums);
 $i = 1;
?>
    <div id="albums">
        <div class="grid-x grid-margin-x text-center">
            @foreach($albums as $album)
                @if($i == $colCount)
                    <div class="columns medium-4 medium-offset-1 end" style="width: 350px">
                        <a href="/albums/{{$album->id}}">
                            <img class="thumbnail" src="/storage/Covers/{{$album->cover_image}}" alt="{{$album->name}}"></a>
                        <h4>{{$album->name}}</h4>

                        @else
                    <div class="columns medium-4 medium-offset-0" style="width: 350px">
                        <a href="/albums/{{$album->id}}">
                            <img class="thumbnail" src="/storage/Covers/{{$album->cover_image}}" alt="{{$album->name}}"></a>
                        <h4>{{$album->name}}</h4>
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
    <p>No Albums To Display...</p>
@endif
@endsection
