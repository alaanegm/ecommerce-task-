<!-- <h1>{{$products}}<h1> -->
@extends('layouts.app')
@section('content')
<a href="{{route('product.create')}}"  class="btn btn-primary">Add new Product</a>
<div class="row justify-content-start">
    
    @foreach($products as $product)
    <div class="col-md-4">
    <div class="card my-3" style="height:400px;">
    <img src="{{asset($product->image)}}" class="card-img-top" alt="..."  width="200" height="200">
    <div class="card-body">
    <h5 class="card-title">{{$product->name}}</h5>
    <p class="card-text">{{$product->description}}</p>
    <p class="card-text fw-bold">{{$product->price}}$</p>
    <a href="{{route('product.show',$product)}}"  class="btn btn-primary">Show</a>
    <form action="{{route('product.destroy', $product)}}" method="post" class="d-inline">
             @csrf
             @method('delete')
             <input type="submit" class="btn btn-danger" value="Delete">
    </form>
    </div>
</div>
</div>
@endforeach
<div class="">
 {!! $products->links() !!}
 </div>
@endsection
    