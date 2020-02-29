<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project_image;

use Image;

class Pro_Images extends Controller
{
    public function show_form(){

        return view('project_images.create');


    }

    public function store(Request $request){

        $request->validate([

            'project_id' => 'required' ,
            'image' => 'required|image|mimes:jpg,jpeg,png,PNG'


        ]);


        $image = $request->file('image');
        $image_ext = $image->getClientOriginalExtension();

        $image_name = uniqid().".".$image_ext;

        $destination = public_path()."/uploads/".$image_name;

        Image::make($image)->save($destination);

        Project_image::create([

            'image' => $image_name ,
            'project_id' => $request->project_id


        ]);

        return back();

    }



}
