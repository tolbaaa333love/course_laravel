@extends('layout')

@section('title')
    developer registration
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

@include('errors.errors')

<form action="{{route('store_new_developer')}}" method="post" enctype="multipart/form-data">

    @csrf

    <div>
        <h1 class="h1">Developer Registration Form</h1>
    </div>

    <div class="form-group">
        <input type="text" name="name" class="form-control" placeholder="name_of_developer">
    </div>
    <div class="form-group">
        <input type="text" name="email" class="form-control" placeholder="email_of_developer">
    </div>
    <div>

        <label for="inputGroupFile01">developer_image</label>

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
        <input type="text" name="special" class="form-control" placeholder="special_of_developer">
    </div>
    <div class="form-group">
        <input type="submit" value="Sign up" class="btn btn-lg btn-primary">
    </div>

</form>

@endsection
