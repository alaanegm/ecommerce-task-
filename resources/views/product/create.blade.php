@extends('layouts.app')
@section('content')
<form method="post"  action="{{route('product.store')}}">
@csrf
  <div class="mb-3">
    <label  class="form-label">Name</label>
    <input type="text" class="form-control" name="name" value="{{ old('name') }}" >
    @error('name')
      <div class="text-danger"> {{$message}}</div>
     @enderror
  </div>
  <div class="mb-3">
    <label  class="form-label">Description</label>
    <input type="text" class="form-control" name="description" value="{{ old('description') }}">
    @error('description')
      <div class="text-danger"> {{$message}}</div>
     @enderror
  </div>
  <div class="mb-3">
    <label  class="form-label">Image</label>
    <input type="text" class="form-control" name="image" value="{{ old('image') }}">
    @error('image')
      <div class="text-danger"> {{$message}}</div>
     @enderror
  </div>
  <div class="mb-3">
    <label  class="form-label">Price</label>
    <input type="text" class="form-control" name="price" value="{{ old('price') }}">
    @error('price')
      <div class="text-danger"> {{$message}}</div>
     @enderror
  </div> 
  <select class="form-select" aria-label="Default select example" name="category_id" value="{{ old('category->name') }}" >
  <option disabled selected value="">categories</option>
  @foreach($categories as $category) 
  <option value="{{$category->id}}">{{$category->name}}</option>
  @endforeach
</select>
<br>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection