@extends('layout')

@section('title')
    show one project
@endsection

@section('styles')

    <style>

        #contain_show{

            background-color : black;
            color : white;
            border-radius : 0px 0px 20px 20px;
            width : 70%;
            margin : 50px auto;
            text-align : center;
            padding-bottom : 20px;

        }
        #contain_show a{

            text-decoration: none;
            color : white;

        }
        img{

            width : 100%;
            height : 200px;
            margin-bottom : 20px;

        }
            #contain_show p{

            font-size : 25px;
            font-weight : bold;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif


        }
        #show_images{

            background-color : black;
            color :white;
            border : 2px solid blue;
            border-radius  : 10px;
            padding : 10px 2px;
            width : 20%;
            margin : 50px auto;
            text-align : center;
            cursor: pointer;


        }
    </style>

@stop

@section('content')

    <div id="show_images">
        show project images
    </div>
    <div id="contain_show">

        <div id="image">
            @foreach ($project->project_images as $item)

                <img src='{{asset("uploads/$item->image")}}' alt="project_image">

            @endforeach
        </div>
        <h1>Project Name</h1>
        <p id="title">{{$project->name}}</p>
        <h1>Project Description</h1>
        <p id="title">{{$project->proj_desc}}</p>
        <h1>Project developers names</h1>
            @foreach ($project->devs as $item)
                <p id="desc">{{$item->name}}</p>
            @endforeach

    </div>
@endsection

@section('scripts')


    <script>

        var image = $('#image');

        var show_images = $('#show_images');

        var contain_show = $('#contain_show');

        show_images.click(function(){

            image.toggle(1000);

            contain_show.css('border-top' , '50px');


        });


    </script>


@stop

