@extends('layout')

@section('title')
    show one books
@endsection

@section('styles')

    <style>

        #contain_show{

            background-color : black;
            color : white;
            padding : 15px;
            border-radius : 20px;
            width : 30%;
            margin : 50px auto;
            text-align : center;

        }
        #contain_show a{

            text-decoration: none;
            color : white;

        }
    </style>

@stop

@section('content')
    <div id="contain_show">

        <h1 id="title">{{$book->title}}</h1>
        <p id="desc">{{$book->book_desc}}</p>
        <a href="{{route('show_all_books')}}">back_to_all_book</a>

    </div>
@endsection

