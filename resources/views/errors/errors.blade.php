@if($errors->any())

<div class="alert alert-danger" style="width : 40%;margin : 50px auto;">
        @foreach ($errors->all() as $item)

            <div>{{$item}}</div>

        @endforeach
</div>

@endif
