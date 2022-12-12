@extends('backend.backend-master')
@section('title','Add Category')
@section('content')
<div class="container">
    <div class="row py-4">
        <div class="col-9 mx-auto"><h2>Add Category <span class="text-danger">{{Session::get('msg')}}</span> </h2>
            <form action="{{ route('category.store') }}" method="POST">
                @csrf
                <div class="mb-3 py-3">
                  <label for='input category name'  class="form-label">Category Name:</label>
                  <input type="text" name="name" class="form-control" placeholder="Give a category name" >
                  @error('name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <button type="submit" class="btn btn-primary">Add Category</button>
              </form>
        </div>
    </div>
</div>
@endsection