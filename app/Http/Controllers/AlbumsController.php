<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;

class AlbumsController extends Controller
{
    //
    public function index(){
        $albums = Album::with('Photos')->get();

        return view('albums.index',compact('albums'));
    }

    public function create(){
        return view('albums.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'cover_image'=>'image|max:1999', //Image size around 2 megabytes, which is defined be default to 2M in php
        ]);

        //Get file name with extension
        $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();

        //Get the file name only
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

        //Get the file extension
        $extension =$request->file('cover_image')->getClientOriginalExtension();

        //Create a new filename
        $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

        //Upload Image
        $path = $request->file('cover_image')->storeAs('public/Covers', $fileNameToStore);

        //Create Album

        $album = new Album;
        $album->name = $request->input('name');
        $album->description = $request->input('description');
        $album->cover_image = $fileNameToStore;

        $album->save();

        return redirect('/albums')->with('success', 'Album Created');
    }

    public function show($id){
        $album = Album::with('Photos')->find($id);
        return view('albums.show', compact('album'));
    }
}
