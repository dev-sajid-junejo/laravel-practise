@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-body">
        <h4>Edit/Update Category</h4>
    </div>
<div class="card-body">
    <form action="{{ url('update-category/' . $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT');
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="name">Name</label>
                <input type="text" value="{{ $category->name }}" class="form-control" name="name">
            </div>
            <div class="col-md-6 mb-3">
                <label for="slug">Slug</label>
                <input type="text" value="{{ $category->slug }}" class="form-control" name="slug">
            </div>
            <div class="col-md-12 mb-3">
                <label for="name">Description</label>
                <textarea class="form-control" name="description" rows="3">{{ $category->description }}</textarea>
            </div>
            <div class="col-md-6 mb-3">
                <label for="status">Status</label>
                <input type="checkbox" {{ $category->status == "1" ? 'checked':'' }} name="status">
            </div>
            <div class="col-md-6 mb-3">
                <label for="popular">Popular</label>
                <input type="checkbox" value="{{ $category->popular }}" name="popular">
            </div>
            <div class="col-md-12 mb-3">
                <label for="name">Meta Title</label>
                <input type="text" value="{{ $category->meta_title }}" class="form-control" name="meta_title">
            </div>
            <div class="col-md-6 mb-3">
                <label for="name">Meta Keywords</label>
                <textarea class="form-control" name="meta_keywords">{{ $category->meta_keywords }}</textarea>
            </div>
            <div class="col-md-6 mb-3">
                <label for="name">Meta Description</label>
                <textarea class="form-control" name="meta_description">{{ $category->meta_descrip }}</textarea>
            </div>
            @if($category->image)
            <img src="{{ asset('assets/uploads/category/'. $category->image) }}" alt="Category Image" >
            @endif
            <div class="col-md-12">
            <input type="file" name="image" class="form-control">
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
</div>
@endsection