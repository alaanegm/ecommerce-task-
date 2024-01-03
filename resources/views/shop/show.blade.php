@extends('layouts.app')
@section('content')

<a href="{{ route('order.create',$shop)  }}"  class="btn btn-warning">Place order</a>
<div class="row justify-content-start">
<h2>{{ $shop->name }} Products</h2>
 @foreach($shop->products as $product)
  <div class="col-md-4">
    <div class="card my-3" style="height:400px;">
      <img src="{{asset($product->image)}}" class="card-img-top" alt="..."  width="200" height="200">
      <div class="card-body">
           <h5 class="card-title">{{$product->name}}</h5>
           <p class="card-text">{{$product->description}}</p>
           <p class="card-text fw-bold">{{$product->price}}$</p>
           <a href="{{route('product.show',$product)}}"  class="btn btn-primary">Show</a>
      </div>
    </div>
  </div>
 @endforeach
</div>
@endsection