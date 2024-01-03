@extends('layouts.app')
@section('content')

<div class="latest row">
   @foreach($products as $categoryProducts)
     <h1>{{$categoryProducts[0]->category->name}}</h1>
     @foreach($categoryProducts as $product)
    <div class="col-md-4">
     <div class="card mb-3" style="height:400px;">
         <img src="{{asset($product->image)}}" class="card-img-top" alt="..."  width="200" height="200">
        <div class="card-body">
            <h3>{{ $product->name }}</h3>
            <p>{{ $product->description }}</p>
            <p>Price: ${{ $product->price }}</p>
            <a href="{{ route('product.show', $product) }}" class="btn btn-primary">Show</a>

            <!-- <h4>Latest Orders:</h4>
            <ul>
               @foreach ($product->orders as $order)
                   <li>Order ID: {{ $order->id }}, Order Date: {{ $order->created_at }}</li>
               @endforeach
           </ul> -->
        </div>
     </div>
</div>
     @endforeach
   @endforeach
</div>

@endsection