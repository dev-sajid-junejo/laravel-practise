@extends('layouts.front')

@section('title')
    Category
@endsection

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>All Categories</h2>
            <div class="col-md-12">
                <div class="row">
                        @foreach ($category as $cate)
                        <div class="col-md-4 mb-2">
                            <a href="{{ url('category/' . $cate->slug) }}">
                            <div class="card">
                                <img src="{{ asset('assets/uploads/category/'.$cate->image) }}" class="w-300 h-300" style="aspect-ratio: 5/4;" alt="Product image">
                                <div class="card-body">
                                    <h5>{{ $cate->name }}</h5>
                                    <p>
                                        {{ $cate->description}}
                                    </p>
                                </div>
                            </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection