@extends('product.layout')

@section('content')
<a class="btn btn-primary my-2" href="{{route('product.index')}}">all product<a>

<table class="table">
  <thead class="table-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">description</th>
      <th scope="col">imae</th>

    </tr>
  </thead>
  <tbody>
   
    <tr>
      <th scope="row">1</th>
      <td>{{$product['name']}}</td>
      <td>{{$product['description']}}</td>
    <td><img  width="150px"src="{{asset('blog/public/images/'."$product->image")}}"></td>`
    
    </tr>

   
  </tbody>
</table>


@endsection