@extends('layout')

@section('title')
    create project
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

    $result = Dev::orderBy('name' , 'asc')->get();

@endphp

@include('errors.errors')

<form action="{{route('store_new_project')}}" method="post" enctype="multipart/form-data">

    @csrf

    <div>
        <h1 class="h1">Form create project</h1>
    </div>

    <div class="form-group">
        <input type="text" name="name" class="form-control" placeholder="project_name">
    </div>
    <div class="form-group">
        <input type="text" name="proj_desc" class="form-control" placeholder="project_description">
    </div>
    <div class="form-group">
        <input type="submit" value="add_new" class="btn btn-lg btn-primary">
    </div>

</form>

@endsection
