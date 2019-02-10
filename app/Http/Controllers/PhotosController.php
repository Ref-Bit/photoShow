<?php

namespace App\Http\Controllers;

use App\Album;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    //
    public function create($album_id){
        return view('photos.create')->with('album_id', $album_id);
    }

    public function store(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'photo'=>'image|max:1999', //Image size around 2 megabytes, which is defined be default to 2M in php
        ]);

        //Get file name with extension
        $fileNameWithExt = $request->file('photo')->getClientOriginalName();

        //Get the file name only
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

        //Get the file extension
        $extension =$request->file('photo')->getClientOriginalExtension();

        //Create a new filename
        $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

        //Upload Image
        $path = $request->file('photo')->storeAs('public/Photos/'. $request->input('album_id'), $fileNameToStore);


        //Upload Photo
        $photo = new Photo;
        $photo->album_id = $request->input('album_id');
        $photo->title = $request->input('title');
        $photo->description = $request->input('description');
        $photo->size = $request->file('photo')->getClientSize();
        $photo->photo = $fileNameToStore;

        $photo->save();

        return redirect('/albums/'. $request->input('album_id'))->with('success', 'Photo Uploaded');
    }

    public function show($id){
        $photo = Photo::find($id);
        return view('photos.show')->with('photo', $photo);
    }

    public function destroy($id){
        $photo = Photo::find($id);

        if (Storage::delete('public/photos/'.$photo->album_id.'/'.$photo->photo)){
         $photo->delete();
        }
        return redirect('/')->with('success', 'Photo Deleted');
    }
}
