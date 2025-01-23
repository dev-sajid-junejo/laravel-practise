@extends('layouts.front')

@section('title')
    Welcome to E-SHOP
@endsection
@section('content')
@include('layouts.inc.slider')

<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>Featured Products</h2>
            <div class="owl-carousel featured-carousel owl-theme">
                @foreach ($featured_products as $prod)
                <div class="item">
                    <div class="card">
                        <img src="{{ asset('assets/uploads/products/' . $prod->image ) }}" class="w-300 h-300" style="aspect-ratio: 5/4;" alt="Product Image">
                        <div class="card-body">
                            <h5> {{ $prod->name }} </h5>
                            <span class="float-start">{{ $prod->selling_price }}</span>
                            <span class="float-end"><s>{{ $prod->original_price }}</s></span>
                        </div>
                    </div>
               </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>Trending Categories</h2>
            <div class="owl-carousel featured-carousel owl-theme">
                @foreach ($trending_products as $trprod)
                <div class="item">
                    <a href="{{ url('category/' . $trprod->slug) }}">
                        <div class="card">
                            <img src="{{ asset('assets/uploads/category/' . $trprod->image ) }}" class="w-300 h-300" style="aspect-ratio: 5/4;" alt="Product Image">
                            <div class="card-body">
                                <h5> {{ $trprod->name }} </h5>
                                <span class="float-start">{{ $trprod->selling_price }}</span>
                                <span class="float-end">{{ $trprod->soriginal_price }}</span>
                            </div>
                        </div>
                    </a>
               </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$('.featured-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:3
        }
    }
})
</script>
@endsection