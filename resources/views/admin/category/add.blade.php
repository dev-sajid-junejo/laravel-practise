@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-body">
        <h4>Add Category</h4>
    </div>
<div class="card-body">
    <form action="{{ url('insert-category') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="col-md-6 mb-3">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" name="slug">
            </div>
            <div class="col-md-12 mb-3">
                <label for="name">Description</label>
                <textarea class="form-control" name="description" rows="3"></textarea>
            </div>
            <div class="col-md-6 mb-3">
                <label for="status">Status</label>
                <input type="checkbox" name="status">
            </div>
            <div class="col-md-6 mb-3">
                <label for="popular">Popular</label>
                <input type="checkbox" name="popular">
            </div>
            <div class="col-md-12 mb-3">
                <label for="name">Meta Title</label>
                <input type="text" class="form-control" name="meta_title">
            </div>
            <div class="col-md-12 mb-3">
                <label for="name">Meta Keywords</label>
                <textarea class="form-control" name="meta_keywords"></textarea>
            </div>
            <div class="col-md-12 mb-3">
                <label for="name">Meta Description</label>
                <textarea class="form-control" name="meta_description"></textarea>
            </div>
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