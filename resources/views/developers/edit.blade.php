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

@include('errors.errors')


    <form action="{{route('update_developer' , $result->id)}}" method="post" enctype="multipart/form-data">

        <div>
            <h1 class="h1">Developer edit Form</h1>
        </div>

        <input type="hidden" name="_method" value="put" />
        @csrf
        <div class="form-group">
            <input type="text" name="name" class="form-control" value="{{$result->name}}">
        </div>
        <div class="form-group">
            <input type="text" name="email" class="form-control" value="{{$result->email}}">
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
            <input type="text" name="special" class="form-control" value="{{$result->special}}">
        </div>
        <div class="form-group">
            <input type="submit" value="edit" class="btn btn-lg btn-danger">
        </div>

    </form>
@endsection
