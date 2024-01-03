<!-- resources/views/categories/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Get Category Products</h2>
        <form method="post" action="{{ route('category.getProducts') }}">
            @csrf
            <label for="category_id">Category ID:</label>
            <input type="text" name="category_id" id="category_id" required>
            <button type="submit">Get Products</button>
        </form>  
    </div>
    @if ($category)
    <div class="container">
        <h2>Category Details</h2>
        @if ($category)
            <p><strong>Category Name:</strong> {{ $category->name }}</p>

            @if ($category->children->count() > 0)
                <h3>Child Categories:</h3>
                <ul>
                    @foreach ($category->children as $childCategory)
                        <li>{{ $childCategory->name }}</li>
                        <ul>
                           @foreach($childCategory->products as $product)
                           <li>{{ $product->name }}</li>
                           @endforeach
                        </ul>
                    @endforeach
                </ul>
            @else
                <p>No child categories.</p>
            @endif

            @if ($category->products->count() > 0)
                <h3>Products of parent:</h3>
                <ul>
                    @foreach ($category->products as $product)
                        <li>{{ $product->name }}</li>
                    @endforeach
                </ul>
            @else
                <p>No products in this category.</p>
            @endif
        @else
            <p>Category not found.</p>
        @endif
    </div>
    @endif
@endsection
