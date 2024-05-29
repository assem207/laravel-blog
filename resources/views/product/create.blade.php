@extends('product.layout')

@section('content')
@if ($errors->any())
    <div>
        <ul>
        @foreach ($errors->all() as $error)
            <li style="color: red">{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

<a class="btn btn-primary my-2" href="{{route('product.index')}}">all product<a>
    <hr>
<form  action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
@csrf
@method('post')
  <div class="form-group">
    <label for="exampleFormControlInput1">name product</label>
    <input type="text" class="form-control" name="name" >
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlTextarea1">description product</label>
    <textarea class="form-control" name="description" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile1"> image product</label>
    <input type="file" class="form-control-file" name="image">
  </div>
  <button class="btn btn-primary my-3" type="submit">create<button>
</form>

@endsection