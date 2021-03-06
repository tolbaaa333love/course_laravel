@extends('layout')

@section('title')
    create project_dev
@endsection

@section('content')

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

@php

    use App\Dev;

    use App\Project;

    $result_developers = Dev::orderBy('name' , 'asc')->get();

    $result_projects = Project::orderBy('name' , 'asc')->get();


@endphp

@include('errors.errors')

<form action="{{route('store_dev_project')}}" method="post">

    @csrf

    <div>
        <h1 class="h1">Form developers and projects</h1>
    </div>

    <div class="form-group">

        <select class="form-control" name="developer_id">

            <option selected disabled>choose developer</option>


            @foreach ($result_developers as $item)

                <option value="{{$item->id}}">{{$item->name}}</option>

            @endforeach

        </select>

    </div>
    <div class="form-group">

        <select class="form-control" name="project_id">

            <option selected disabled>choose developer</option>


            @foreach ($result_projects as $item)

                <option value="{{$item->id}}">{{$item->name}}</option>

            @endforeach

        </select>

    </div>
    <div class="form-group">
        <input type="submit" value="add_new" class="btn btn-lg btn-primary">
    </div>

</form>

@endsection
