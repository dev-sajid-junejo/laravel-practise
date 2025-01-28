@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-body">
        <h4>Add Product</h4>
    </div>
<div class="card-body">
    <form action="{{ url('insert-products') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12 mb-3">
                <select class="form-select" name="cate_id">
                    <option value="">Select a Category</option>
                    @foreach ($category as $item)
                        <option value="{{ $item->id }}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" name="slug">
                @error('slug')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-12 mb-3">
                <label for="name">Small Description</label>
                <textarea class="form-control" name="small_description" rows="3"></textarea>
                @error('small_description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-12 mb-3">
                <label for="name">Description</label>
                <textarea class="form-control" name="description" rows="3"></textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Original Price</label>
                <input type="number" class="form-control" name="original_price" id="">
                @error('original_price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Selling Price</label>
                <input type="number" class="form-control" name="selling_price" id="">
                @error('selling_price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Tax</label>
                <input type="number" class="form-control" name="tax" id="">
                @error('tax')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Quantity</label>
                <input type="number" class="form-control" name="qty" id="">
                @error('qty')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="status">Status</label>
                <input type="checkbox" name="status">
            </div>
            <div class="col-md-6 mb-3">
                <label for="trending">Trending</label>
                <input type="checkbox" name="trending">
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