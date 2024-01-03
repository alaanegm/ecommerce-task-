<!-- resources/views/orders/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Your Orders</h1>

    @if(count($orders) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Order Date</th>
                    <th>Product Name </th>
                    <th>Quantity </th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>
                            <ul>
                                @foreach($order->products as $product)
                                    <li>{{ $product->name }}</li>
                                @endforeach
                            </ul>
                        </td>
                       <td>
                       @foreach($order->products as $product)
                                    <li>  {{ $product->pivot->quantity }}</li>
                                @endforeach
                      </td> 
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>You haven't placed any orders yet.</p>
    @endif
@endsection
