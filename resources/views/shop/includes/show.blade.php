@extends('shop.layouts.master')
@section('content')
    <style>
        .section-title {
            margin: 38px -86px 47px 432px;
            margin-right: -243px;
        }
    </style>
    <div class="fs_menu_overlay"></div>
    <div class="col-lg-6 text-center">
        <div class="section-title">
            <h1>Chi tiết sản phẩm </h1>
            <p>Thương hiệu mang đến sự thành công</p>
        </div>
    </div>
    <div class="container single_product_container">
        <div class="row">
            <div class="col-lg-7">
                <div class="single_product_pics">
                    <div class="row">
                        <div class="col-lg-9 image_col order-lg-2 order-1">
                            <div class="product_image">
                                <img src="{{ asset('public/assets/product/' . $product->image) }}"
                                    alt="{{ $product->name }}" width="300px" height="300px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="product_details">

                    <div class="free_delivery d-flex flex-row align-items-center justify-content-center">
                    </div>
                    <div class="product_price"> TÊN : {{($product->name)}} </div> <br>
                    <div class="product_price">SỐ LƯỢNG : {{($product->quantity)}}Chiếc</div> <br>
                    <div class="product_price">HÃNG XE : {{($product->category->name)}}</div> <br>
                    <div class="product_price">GIÁ: {{ number_format($product->price)}} VNĐ</div> <br>
                    <div>
                        <a href="{{ route('shop.index') }}" class="btn btn-primary">Quay lại </a>
                        <a href="{{ route('add-to-cart', $product->id) }}"class="btn btn-danger">Thêm vào giỏ hàng</a>
                    </div><br>
                </div>
            </div>
            <div class="product_details_title">
                MÔ TẢ:{!!$product->description !!}
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
