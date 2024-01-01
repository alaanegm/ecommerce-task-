
@extends('layouts.app')
@section('content')
<!-- <a href="{{route('product.create')}}"  class="btn btn-primary">Add new Product</a> -->
<div class="row justify-content-start">
    @foreach($shops as $shop)
    <div class="col-md-4">
     <div class="card my-3">
        <img src="img.avif" class="card-img-top" alt="..."  width="200" height="200">
       <div class="card-body">
        <h1 class="card-title"><a href="{{ route('shop.show',$shop) }}" class="link-underline-none">{{ $shop->name }}</a><br></h1>
       </div>
     </div>
    </div>
   @endforeach
</div>
@endsection

