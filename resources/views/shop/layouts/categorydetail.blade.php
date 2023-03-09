@extends('shop.layouts.master')
@section('content')
<div class="row">
    @foreach ($products as $product)
        <div class="col-lg-3 col-md-6">
            <div class="single-product">
                <img class="img-fluid" src="{{ asset('public/assets/product/' . $product->image) }}"
                    alt="">
                <div class="product-details">
                    <h6>{{ $product->name }}</h6>
                    <div class="price">
                        <h6>{{ number_format($product->price) }} $</h6>
                        {{-- <h6 class="l-through">{{$product->price}}</h6> --}}
                    </div>
                    <div class="prd-bottom">

                        <a href="" class="social-info">
                            <span class="ti-bag"></span>
                            <p class="hover-text">Giỏ hàng</p>
                        </a>

                        <a href="" class="social-info">
                            <span class="lnr lnr-move"></span>
                            <p class="hover-text">Chi tiết</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
</div>
@endsection
