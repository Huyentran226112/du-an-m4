@extends('shop.layouts.master')
@section('content')
@include('sweetalert::alert')
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
        <div class="row" id="list-products">
            @foreach ($products as $product)
            <div class=" col-lg-3 col-md-6" id="product-list">
                <div class="single-product">
                    <img class="img-fluid" src="{{ asset('public/assets/product/' . $product->image) }}" alt="">
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

    </div>
</div>
<style>
img.img-fluid {
    width: 300px;
    height: 200px;
}
</style>
<section class="exclusive-deal-area">
    <div class="container-fluid">
        <div class="section-title1">
            <h1>Sản phẩm nổi bật</h1>
            <p>Thương hiệu mang đến sự thành công</p>
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6 no-padding exclusive-left">
                    <div class="row clock_sec clockdiv" id="clockdiv">
                        <div class="col-lg-12">
                            <h1>CAR WORLD!</h1>
                            <p>Cỗ máy thời thượng tốt nhất hoặc không gì. </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 no-padding exclusive-right">
                    <h5>sản phẩm nổi bật </h5>
                    <div class="active-exclusive-product-slider">
                        @foreach ($hot_products as $product)
                        <div class="single-exclusive-slider">
                            <img class="img-fluid" src="{{ asset('public/assets/product/' . $product->image) }}">
                            <div class="product-details"><br>
                                <h4>{{ $product->name }}</h4>
                                <div class="price">
                                    <h6>{{ number_format($product->price) }} $</h6>
                                </div>
                                <div class="add-bag d-flex align-items-center justify-content-center">
                                    <a class="add-btn" href="{{route('showsanpham',$product->id)}}"><span
                                            class="ti-bag"></span></a>
                                    <span class="add-text text-uppercase">Giỏ hàng</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End exclusive deal Area -->
<!-- End exclusive deal Area -->


<!-- End exclusive deal Area -->
@endsection
@section("scripts")
<script>
    $(document).ready(function() {
        $("#search-product").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            alert(value);
            $("#list-products #product-list").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
    </script>
@endsection
