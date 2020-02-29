@extends('layout')

@section('title')
    edit books
@endsection

@section('styles')

    <style>

        form{

            width : 70%;
            padding : 15px;
            margin : 50px auto;
            background-color : black;
            color : white;
            border-radius : 20px; 

        }
        form div .h1{

            margin-bottom : 50px; 

        }
        input[type="file"] , input[type="text"] , textarea[name="desc"]{

            border: 1px solid white;

        }
        label[for="img"]{

            font-size : 20px;
            font-weight : bold;

        }
    </style>
@stop

@section('content')

@php

    use App\Author;

    $result_author = Author::orderBy('name' , 'asc')->get();

@endphp

@include('errors.errors')


    <form action="{{route('update_book' , $result->id)}}" method="post" enctype="multipart/form-data">

        <input type="hidden" name="_method" value="put" />
        @csrf
        <div>
            <h1 class="h1">Form edit book</h1>
        </div>
    
        <div class="form-group">
            <input type="text" name="title" class="form-control" value="{{$result->title}}">
        </div>
        <div class="form-group">
            <textarea name="desc" cols="30" rows="10" class="form-control" placeholder="description_of_book">{{$result->book_desc}}</textarea>
        </div>
        <div class="form-group">
            <select name="author_id" class="form-control">
                <option selected disabled>choose author book name</option>
                @foreach ($result_author as $item)
    
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    
                @endforeach
            </select>
        </div>
        <div>
            <label for="img">book_new_image</label>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
        </div>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="new_image">
            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
        </div>
        </div>
        <div class="form-group">
            <input type="submit" value="edit" class="btn btn-lg btn-danger">
        </div>


    </form>
@endsection
