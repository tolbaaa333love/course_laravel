@extends('layout')

@section('title')
    edit authors
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


    <form action="{{route('update_author' , $result->id)}}" method="post" enctype="multipart/form-data">

        <input type="hidden" name="_method" value="put" />
        @csrf
        <div>
            <h1 class="h1">Form edit author</h1>
        </div>
    
        <div class="form-group">
            <input type="text" name="name" class="form-control" value="{{$result->name}}">
        </div>
        <div class="form-group">
            <input type="submit" value="edit" class="btn btn-lg btn-danger">
        </div>


    </form>
@endsection
