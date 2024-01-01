
@extends('layouts.app')
@section('content')
<a href="{{route('category.create')}}"  class="btn btn-primary">Add new category</a>
<div class="container">
<div class="row justify-content-start">
  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Category ID</th>
      <th scope="col">Category Name</th>
      <th scope="col">Parent Category</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($categories as $category)
    <tr>
      <td>{{$category->id}}</td>
      <td><a href="{{route('category.show', $category)}}">{{$category->name}}</a></td>
      <td>{{ $category->parentCategory ? $category->parentCategory->name : 'No Parent Category' }}</td>
      <td>
        <a href="{{route('category.edit', $category)}}"  class="btn btn-info">Edit</a>
        <form action="{{route('category.destroy', $category->id)}}" method="post" class="d-inline">
             @csrf
             @method('delete')
             <input type="submit" class="btn btn-danger" value="Delete">
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
 </div>
</div>
<div class="">
{!! $categories->links() !!}
</div>
@endsection
    