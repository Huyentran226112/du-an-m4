@extends('shop.layouts.master')
@section('content')
    <br>
    <br>

    <style>
        img.img-fluid {
            width: 300px;
            height: 200px;
            border-radius: 15px;

        }

        img.img-fluid:hover {
            width: 350px;
            height: 250px;
        }
    </style>
    <div class="single-product-slider">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Sản phẩm </h1>
                        <p>Thương hiệu mang đến sự thành công</p>
                    </div>
                </div>
            </div>
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

                                    <a href="{{ route('add-to-cart', $product->id) }}" class="social-info">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">Giỏ hàng </p>
                                    </a>

                                    <a href="{{ route('showsanpham', $product->id) }}" class="social-info">
                                        <span class="lnr lnr-move"></span>
                                        <p class="hover-text">chi tiết </p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endsection

    </div>
</div>
