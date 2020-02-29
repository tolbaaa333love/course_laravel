@extends('layout')

@section('title')
    all authors
@endsection

@section('styles')

    <style>

        #father_contain{

            display : flex;
            justify-content: space-around;

        }
        #contain{

            background-color : black;
            color : white;
            width : 30%;
            padding : 20px;
            border-radius : 20px;
            text-align : center;


        }
        #contain form input[type="submit"]{

            border-radius : 10px;
            border : 2px solid white;
            background-color : black;
            color : white;
            padding : 5px;
            width : 30%;

        }
        #contain a{

            text-decoration : none;
            color : white;


        }
        #create{

            background-color : black;
            color : white;
            padding : 10px;
            margin : 50px auto 100px auto;
            width : 30%;
            text-align : center;
            font-size : 20px;
            border-radius : 20px;

        }
        #create a{

            text-decoration: none;
            color : white;

        }

    </style>

@stop

@section('content')

    <div id="create">
        <a href="{{route('show_create_page_project')}}">create_new_project</a>
    </div>
    <div id="father_contain">
    @foreach ($projects as $item)

        <div id="contain">
            <p id="title">project_name : {{$item->name}}</p>
            <a href="{{route('show_one_project' , $item->id)}}">show</a><br><br>
            <a href="{{route('edit_project' , $item->id)}}">edit</a><br><br>
            <form action="{{route('project_delete' , $item->id)}}" method="post">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <input type="submit" value="delete">
            </form>
        </div>

    @endforeach

    </div>

@endsection
