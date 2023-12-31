@extends('layouts.app')
@section('content')
<div class="container">
 <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h2 class="card-title">{{$category->name}}</h2>
    <div class="products">
    @if($category->products->count() >0)
        <p class="my-4">Products of this Category</p>
        <ul>
          @foreach($category->products as $pro)
           <a href=""><li>{{$pro->name}}</li></a>
         @endforeach
        </ul>
    @else
      <p>no products for this category</p>
    @endif
    </div>
    <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
  </div>
 </div>
</div>
@endsection