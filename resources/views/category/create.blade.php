@extends('layouts.app')
@section('content')
<div class="container">
<form method="post"  action="{{route('category.store')}}" enctype="multipart/form-data">
@csrf
  <div class="mb-3">
    <label  class="form-label">Name</label>
    <input type="text" class="form-control" name="name">
    @error('name')
      <div class="text-danger"> {{$message}}</div>
     @enderror
  </div>
   <div class="mb-3">
    <label class="form-label">Parent Category</label>
    <select name="parent_id" id="parent_id" class="form-control">
        <option value="" selected disabled>Select Parent Category</option>
        <option value="">
              Null
           </option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">
               {{ $category->name }}
           </option>
        @endforeach
    </select>
    @error('parent_id')
      <div class="text-danger"> {{$message}}</div>
     @enderror
  </div> 
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection