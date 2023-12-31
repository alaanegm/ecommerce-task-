@extends('layouts.app')
@section('content')
<form method="post" action="{{route('category.update',$category->id)}}" enctype="multipart/form-data">
@csrf
@method('PUT')
  <div class="mb-3">
    <label  class="form-label">name</label>
    <input type="text" class="form-control" name="name" value="{{ old('name', $category->name) }}">
  </div>
  <div class="mb-3">
    <label class="form-label">Parent Category</label>
      <select name="parent_id" id="parent_id" class="form-control">
          <option value="" {{ old('parent_id', $category->parent_id) == null ? 'selected' : '' }}>
              Null
          </option>
          @foreach($categories as $categoryOption)
              <option value="{{ $categoryOption->id }}" {{ old('parent_id', $category->parent_id) == $categoryOption->id ? 'selected' : '' }}>
                  {{ $categoryOption->name }}
              </option>
          @endforeach
      </select>
    @error('parent_id')
      <div class="text-danger"> {{$message}}</div>
     @enderror
  </div> 
  
  <button type="submit" class="btn btn-primary">edit</button>
</form>
@endsection