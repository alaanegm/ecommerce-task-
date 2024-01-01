@extends('layouts.app')
@section('content')

<form method="post" action="{{route('product.update',$product->id)}}">
@csrf
@method('PUT')
  <div class="mb-3">
    <label  class="form-label">Title</label>
    <input type="text" class="form-control" name="name"   value="{{ $product->name }}">
    @error('name')
      <div class="text-danger"> {{$message}}</div>
     @enderror
  </div>
  <div class="mb-3">
    <label  class="form-label">Description</label>
    <input type="text" class="form-control" name="description" value="{{ $product->description }}">
    @error('description')
      <div class="text-danger"> {{$message}}</div>
     @enderror
  </div>
  <div class="mb-3">
    <label  class="form-label">Image</label>
    <input type="text" class="form-control" name="image" value="{{ $product->image }}">
    @error('image')
      <div class="text-danger"> {{$message}}</div>
     @enderror
  </div>
  <div class="mb-3">
    <label  class="form-label">Price</label>
    <input type="text" class="form-control" name="price" value="{{ $product->price }}">
    @error('price')
      <div class="text-danger"> {{$message}}</div>
     @enderror
  </div>
  <select class="form-select" aria-label="Default select example" name="category_id" value="{{ $product->category_id }}" >
  <option disabled selected value="">categories</option>
  @foreach($categories as $category) 
  <option value="{{$category->id}}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
  @endforeach
  @error('category_id')
      <div class="text-danger"> {{$message}}</div>
  @enderror
</select>
<br>
  <button type="submit" class="btn btn-primary">edit</button>
</form>
@endsection