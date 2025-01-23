@extends('layouts.front')
@section('title', $product->name)

@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{ url('category') }}">Collections</a> /
            <a href="{{ url('category/'.$product->category->slug) }}">{{ $product->category->name }}</a> /
            <a href="{{ url('category/'.$product->category->slug.'/'.$product->slug) }}">{{ $product->name }}</a>
        </h6>
    </div>
</div>

<div class="container">
    <div class="card shadow product_data">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 border-right">
                    <img src="{{ asset('assets/uploads/products/'.$product->image) }}" class="w-100" alt="">
                </div>
                <div class="col-md-8">
                    <h2>{{ $product->name }}
                    @if($product->trending == 1)
                        <label style="font-size: 16px;" class="float-end badge bg-danger trending_tag">Trending</label>
                    @endif
                    </h2>
                    <hr>
                    <label class="me-3">Original Price: <s>Rs {{ $product->original_price }}</s></label>
                    <label class="fw-bold">Selling Price: Rs {{ $product->selling_price }}</label>
                    <p class="mt-3">
                        {!! $product->small_description !!} 
                    </p>
                    <hr>
                    @if($product->qty > 0)
                        <label class="badge bg-success">In stock</label>
                    @else
                        <label class="badge bg-danger">Out of stock</label>
                    @endif

                    <div class="row mt-2">
                        <div class="col-md-3">
                            <input type="hidden" value="{{$product->id}}" class="prod_id">
                        
                            <label for="Quantity">Quantity</label>
                            <div class="input-group text-center mb-3" style="width:130px;">
                                <button class="input-group-text decrement-btn">-</button>
                                <input type="text" name="quantity" class="form-control qty-input text-center" value="1" />
                                <button class="input-group-text increment-btn">+</button>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <br/>
                            @if($product->qty > 0)
                            <button type="button" class="btn btn-primary me-3 addToCartBtn float-start">Add to Cart <i class="fa fa-shopping-cart"></i></button>
                            @endif
                            <button type="button" class="btn btn-success me-3 float-start">Add to Wishlist <i class="fa fa-heart"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <hr>
                    <h2>Description</h2>
                       <h6> {{$product->description}} </h6>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
