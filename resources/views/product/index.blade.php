@extends('layouts.app')

@section('content')
<a href="{{ route('product.create') }}" class="btn btn-primary">Add new Product</a>
<table class="table mt-3">
    <thead>
        <tr>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td><img src="{{ asset($product->image) }}" alt="{{ $product->name }}" width="50" height="50"></td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->price }}$</td>
            <td>
                <a href="{{ route('product.show', $product) }}" class="btn btn-primary">Show</a>
                <form action="{{ route('product.destroy', $product) }}" method="post" class="d-inline">
                    @csrf
                    @method('delete')
                    <input type="submit" class="btn btn-danger" value="Delete">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="mt-3">
    {!! $products->links() !!}
</div>
@endsection
