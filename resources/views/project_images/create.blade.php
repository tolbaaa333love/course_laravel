@extends('layout')

@section('title')
    create project_image
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

    use App\Project;

    $result_projects = Project::orderBy('name' , 'asc')->get();


@endphp

@include('errors.errors')

<form action="{{route('store_project_image')}}" method="post" enctype="multipart/form-data">

    @csrf

    <div>
        <h1 class="h1">Form project images</h1>
    </div>
    <div class="form-group">

        <select class="form-control" name="project_id">

            <option selected disabled>choose projects</option>


            @foreach ($result_projects as $item)

                <option value="{{$item->id}}">{{$item->name}}</option>

            @endforeach

        </select>

    </div>
    <div>
        <label for="inputGroupFile01">project_image</label>
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
        </div>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="image">
          <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
        </div>
    </div>
    <div class="form-group">
        <input type="submit" value="add_new" class="btn btn-lg btn-primary">
    </div>

</form>

@endsection
