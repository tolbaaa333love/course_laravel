@extends('layout')

@section('title')
    show one developer
@endsection

@section('styles')

    <style>

        #contain_show{

            background-color : black;
            color : white;
            border-radius : 20px;
            width : 70%;
            padding-bottom : 20px;
            margin : 50px auto;
            text-align : center;
            border : 2px solid blue;

        }
        #contain_show a{

            text-decoration: none;
            color : white;

        }
        img{

            width : 100%;
            height : 200px;
            margin-bottom : 20px;
            border-radius : 20px 20px 0px 0px;

        }
        #show_all_developers{

            text-align : center;
            background-color : black;
            width : 20%;
            margin : 30px auto;
            padding : 5px;
            border-radius : 10px;
            font-size : 20px;

        }
        #show_all_developers a{

            text-decoration: none;
            color : white;

        }
        #contain_show p{

            font-size : 25px;
            font-weight : bold;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif


        }
    </style>

@stop

@section('content')
    <div id="contain_show">

        <img src='{{asset("uploads/$developer->image")}}' alt="developer_image">
        <h1>Name</h1>
        <p id="title">{{$developer->name}}</p>
        <h1>Email</h1>
        <p id="title">{{$developer->email}}</p>
        <h1>Special</h1>
        <p id="title">{{$developer->special}}</p>
        @if( !empty($developer->projects[0]) )
        <h1>Projects details</h1>
            @foreach ($developer->projects as $item)
                <h2>name</h2>
                <p id="desc">{{$item->name}}</p>
                <h2>description</h2>
                <p id="desc">{{$item->proj_desc}}</p>
            @endforeach
        @endif

    </div>


@endsection

