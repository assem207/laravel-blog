@extends('product.layout')

@section('content')

@if($message = \Illuminate\Support\Facades\Session::get('success'))
<div class="alert alert-primary" role="alert">
  {{$message}}
</div>
@endif
<table class="table">
  <thead class="table-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">description</th>
      <th scope="col">imae</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($products as $product)
    <tr>
      <th scope="row">1</th>
      <td>{{$product['name']}}</td>
      <td>{{$product['description']}}</td>
    <td><img  width="150px"src="{{asset('blog/public/images/'."$product->image")}}"</td>`
    <td class="d-flex flex-column   ">
    @auth
       <form action="{{route("product.destroy",$product['id'])}}" method="post">
       @csrf  

           @method('DELETE')
         <button type="submit" class="btn btn-danger">delete</button>
       </form>
      
         <a class="btn btn-primary my-1" href="{{route("product.edit",$product['id'])}}">edit</a>
         @endauth
         <a class="btn btn-info" href="{{route("product.show",$product['id'])}}">show</a>
    </td>
    </tr>
    @endforeach
   
  </tbody>
</table>

{!! $products->links() !!}

@endsection