@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<div class="row flex justify-content-between">
<div class="col-6">
  <div class="card">
  <div class="row">
    <div class="col-md-5">
    <img src="{{asset($product->image)}}" class="img-fluid rounded-start" style="height:100%;">
    </div>
    <div class="col-md-7">
      <div class="card-body">
      <h3 class="card-title fs-2">{{$product->name}}</h3>
        <p class="card-text fs-4">{{$product->description}}</p>
         @if ($product->category)
         <a href="{{route('category.show', $product->category_id)}}"> <p class="card-text fs-4">{{$product->category->name}}</p></a>
         @endif
        <p class="card-text"><small class="text-body-secondary fs-4">{{$product->price}}$</p>
        <ul>
          @foreach($product->shops as $shop)
          <li>
          <a href="{{ route('order.create', ['shop' => $shop->id]) }}" class="link-underline-none">{{ $shop->name }}</a>
          </li>
          @endforeach
        </ul>
      </div>
      <a href="{{route('product.edit', $product)}}"  class="btn btn-danger m-2">Edit</a>
    </div>
  </div>
   </div>
</div>

</div>
@endsection