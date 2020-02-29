<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Book;
use Illuminate\Support\Facades\Storage;
use Image;

use Illuminate\Support\Facades\DB; 

class bookController extends Controller
{
    //

    public function index(){

        $books = Book::get();

        return view('books.index' , ["books" => $books]);


    }

    public function show($id){

        $book = Book::findOrFail($id);

        return view('books.show' , ['book' => $book]);


    }

    public function create(){

        return view('books.create');


    }

    public function store (Request $request){

        $request->validate([

            'title' => 'required|string|max:100' ,
            'description' => 'required|string' ,
            'img' => 'nullable|image|mimes:jpeg,jpg,png'

        ]);

        if($request->hasFile('img')){

            $image = $request->file('img');
            $image_ext = $image->getClientOriginalExtension();

            $image_name = uniqid().".".$image_ext;

            $destination = public_path()."/uploads/".$image_name;
            Image::make($image)->save($destination);



        }
        else{

            $image_name = null;

        }

        Book::create([

            'title' => $request->title ,
            'book_desc' => $request->input('description') ,
            'img' => $image_name ,
            'author_id' => $request->input('author_id')


        ]);

        return redirect(route('show_all_books'));
    


    }

    public function edit($book_id){

        $result = Book::findOrFail($book_id);

        return view('books\edit' , ['result' => $result]);

    }

    public function update(Request $request , $book_id){


        $request->validate([

            'title' => 'required|string|max:100' ,
            'desc' => 'required|string' ,
            'author_id' => 'required' , 
            'new_img' => 'nullable|image|mimes:jpg,jpeg,png'



        ]);

        $book = Book::findOrFail($book_id);

        if($request->hasFile('new_image')){

            if($book->img !== null){

                Storage::disk('uploads')->delete($book->img);

            }            

            $new_image = $request->file('new_image');
            $new_image_ext = $new_image->getClientOriginalExtension();

            $new_image_name = uniqid().".".$new_image_ext;

            $destination = public_path()."/uploads/".$new_image_name;
            Image::make($new_image)->save($destination);

            


        }
        else{

            $new_image_name = $book->img;


        }


        Book::where('id' , $book_id)->update([

            'title' => $request->title ,
            'book_desc' => $request->desc ,
            'img' => $new_image_name , 
            'author_id' => $request->author_id


        ]);



        return redirect(route('show_all_books'));


    }

    public function delete($book_id){

        $book = Book::findOrFail($book_id);

        $image = $book->img;

        if($image !== null){

            Storage::disk('uploads')->delete($image);

        }

        $book->delete();


        return back();

    }
}
