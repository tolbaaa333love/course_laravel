<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Dev;

use Image;

class DevController extends Controller
{

    public function index(){

        $developers = Dev::get();

        return view('developers.index' , ["developers" => $developers]);


    }

    public function show($id){

        $developer = Dev::findOrFail($id);

        return view('developers.show' , ['developer' => $developer]);


    }

    public function create(){

        return view('developers.create');


    }

    public function store (Request $request){

        $request->validate([

            'name' => 'required|string|max:100' ,
            'email' => 'required|string|email|max:100' ,
            'image' => 'image|mimes:jpg,jpeg,png' ,
            'special' => 'required|string|max:100' ,

        ]);

        if($request->hasFile('image')){


            $image = $request->file('image');
            $image_ext = $image->getClientOriginalExtension();

            $image_name = uniqid().".".$image_ext;

            $destination = public_path()."/uploads/".$image_name;
            Image::make($image)->save($destination);


        }


        Dev::create([

            'name' => $request->name ,
            'email' => $request->email ,
            'image' => $image_name ,
            'special' => $request->special ,


        ]);

        return redirect(route('show_all_developers'));



    }

    public function edit($developer_id){

        $result = Dev::findOrFail($developer_id);

        return view('developers\edit' , ['result' => $result]);

    }

    public function update(Request $request , $developer_id){


        $request->validate([

            'name' => 'required|string|max:100' ,
            'email' => 'required|string|email|max:100' ,
            'image' => 'image|mimes:jpg,jpeg,png' ,
            'special' => 'required|string|max:100' ,

        ]);

        $developer = Dev::find($developer_id);

        if($request->hasFile('new_image')){


            if($developer->image !== "dev.jpg"){

                Storage::disk('uploads')->delete($developer->image);

            }

            $new_image = $request->file('new_image');
            $image_ext = $new_image->getClientOriginalExtension();

            $image_name = uniqid().".".$image_ext;

            $destination = public_path()."/uploads/".$image_name;
            Image::make($new_image)->save($destination);


        }

        else{

            $image_name = $developer->image;


        }

        Dev::where('id' , $developer_id)->update([


            'name' => $request->name ,
            'email' => $request->email ,
            'image' => $image_name ,
            'special' => $request->special,

        ]);



        return redirect(route('show_all_developers'));


    }

    public function delete($developer_id){

        $author = Dev::findOrFail($developer_id);

        $author->delete();

        return back();

    }
}

