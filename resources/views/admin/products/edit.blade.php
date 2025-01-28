@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-body">
        <h4>Edit/Update Product</h4>
    </div>
<div class="card-body">
    <form action="{{ url('update-product/' . $product->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-12 mb-3">
                <select class="form-select">
                    <option value="">{{ $product->category->name}}</option>
                </select>
                @error('cate_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="name">Name</label>
                <input type="text" value="{{ $product->name}}" class="form-control" name="name" required>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="slug">Slug</label>
                <input type="text" value="{{ $product->slug}}" class="form-control" name="slug" required>
                @error('slug')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-12 mb-3">
                <label for="name">Small Description</label>
                <textarea class="form-control" name="small_description" rows="3">{{$product->small_description}}</textarea>
                @error('small_description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-12 mb-3">
                <label for="name">Description</label>
                <textarea class="form-control" name="description" rows="3" required>{{ $product->description}}</textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Original Price</label>
                <input type="number" class="form-control" value="{{ $product->original_price }}" name="original_price" id="" required>
                @error('original_price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Selling Price</label>
                <input type="number" class="form-control" name="selling_price" value="{{ $product->selling_price}}" id="" required>
                @error('selling_price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Tax</label>
                <input type="number" class="form-control" name="tax" value="{{ $product->tax}}" id="" required>
                @error('tax')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Quantity</label>
                <input type="number" class="form-control" name="qty" value="{{ $product->qty}}" id="" required>
                @error('qty')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="status">Status</label>
                <input type="checkbox" {{ $product->status == "1" ? 'checked':''}} name="status">
            </div>
            <div class="col-md-6 mb-3">
                <label for="trending">Trending</label>
                <input type="checkbox" {{ $product->trending == "1" ? 'checked':''}} name="trending">
            </div>
            <div class="col-md-12 mb-3">
                <label for="name">Meta Title</label>
                <input type="text" class="form-control" value="{{ $product->meta_title}}" name="meta_title">
            </div>
            <div class="col-md-12 mb-3">
                <label for="name">Meta Keywords</label>
                <textarea class="form-control" name="meta_keywords">{{ $product->meta_keywords}}</textarea>
            </div>
            <div class="col-md-12 mb-3">
                <label for="name">Meta Description</label>
                <textarea class="form-control" name="meta_description">{{ $product->meta_description}}</textarea>
            </div>
            @if($product->image)
            <img src="{{ asset('assets/uploads/products/'. $product->image) }}" class="cate-edit-images" alt="Product Image" >
            @endif
            <div class="col-md-12">
            <input type="file" name="image" class="form-control" required>
            @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
</div>
@endsection