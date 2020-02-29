<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Author;

class AuthorController extends Controller
{
    //
    public function index(){

        $authors = Author::get();

        return view('authors.index' , ["authors" => $authors]);


    }

    public function show($id){

        $author = Author::findOrFail($id);

        return view('authors.show' , ['author' => $author]);


    }

    public function create(){

        return view('authors.create');


    }

    public function store (Request $request){

        $request->validate([

            'name' => 'required|string|max:100' ,

        ]);

        Author::create([

            'name' => $request->name ,
        
        ]);

        return redirect(route('show_all_authors'));
    


    }

    public function edit($author_id){

        $result = Author::findOrFail($author_id);

        return view('authors\edit' , ['result' => $result]);

    }

    public function update(Request $request , $author_id){


        $request->validate([

            'name' => 'required|string|max:100' ,

        ]);

        Author::where('id' , $author_id)->update([

            'name' => $request->name ,


        ]);



        return redirect(route('show_all_authors'));


    }

    public function delete($author_id){

        $author = Author::findOrFail($author_id);

        $author->delete();

        return back();

    }
}
