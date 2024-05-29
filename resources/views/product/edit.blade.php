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
<form  action="{{ route('product.update',$product->id) }}" method="post" enctype="multipart/form-data">
@csrf
@method('put')
  <div class="form-group">
    <label for="exampleFormControlInput1">name product</label>
    <input type="text" class="form-control" value="{{$product->name}}" name="name" >
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlTextarea1">description product</label>
    <textarea class="form-control" name="description" rows="3"> {{$product->description}}</textarea>
  </div>
  <img src="{{ asset('blog/public/images/'.trim($product->image, '"')) }}" height="100px" width="100px" alt="">
  <img src="{{asset('blog/public/images/'."$product->image")}}" width="100px">

  <div class="form-group">
  
    <label for="exampleFormControlFile1"> image product</label>
    <input type="file" class="form-control-file" name="image">
  </div>
  <button class="btn btn-primary my-3" type="submit">update<button>
</form>

@endsection