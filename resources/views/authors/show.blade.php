@extends('layout')

@section('title')
    show one author
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

        <h1 id="title">{{$author->name}}</h1>
        <h3>books author titles : </h3>
        @foreach ($author->books as $item)
            <p id="desc">{{$item->title}}</p>
        @endforeach
        <a href="{{route('show_all_authors')}}">back_to_all_authors</a>

    </div>
@endsection

