<!-- resources/views/orders/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Place Order for {{ $shop->name }}</h2>
        <form method="post" action="{{ route('order.store', ['shop' => $shop->id]) }}">
            @csrf
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Image</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                             <td><img src="{{asset($product->image)}}" class="img-fluid rounded-start" style="height:100px; width:100px;"></td>

                            <td>
                                <select name="products[{{ $product->id }}]" class="form-control">
                                    @for ($i = 0; $i <= 10; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Place Order</button>
        </form>
    </div>
@endsection
