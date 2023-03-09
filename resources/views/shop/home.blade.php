@extends('shop.layouts.master')
@section('content')
<style>
        img.img-fluid {
            width: 300px;
            height: 200px;
            border-radius: 15px;
        }
</style>
<div class="container">
    <div class="row">
        <div class="col-xl-3 col-lg-4 col-md-5">
            <div class="sidebar-categories">
                <div class="head">Browse Categories</div>
                <ul class="main-categories">
                    <li class="main-nav-list"><a data-toggle="collapse" href="#fruitsVegetable" aria-expanded="false" aria-controls="fruitsVegetable"><span
                             class="lnr lnr-arrow-right"></span>Fruits and Vegetables<span class="number">(53)</span></a>
                        <ul class="collapse" id="fruitsVegetable" data-toggle="collapse" aria-expanded="false" aria-controls="fruitsVegetable">
                            <li class="main-nav-list child"><a href="#">Frozen Fish<span class="number">(13)</span></a></li>
                            <li class="main-nav-list child"><a href="#">Dried Fish<span class="number">(09)</span></a></li>
                            <li class="main-nav-list child"><a href="#">Fresh Fish<span class="number">(17)</span></a></li>
                            <li class="main-nav-list child"><a href="#">Meat Alternatives<span class="number">(01)</span></a></li>
                            <li class="main-nav-list child"><a href="#">Meat<span class="number">(11)</span></a></li>
                        </ul>
                    </li>

                    <li class="main-nav-list"><a data-toggle="collapse" href="#meatFish" aria-expanded="false" aria-controls="meatFish"><span
                             class="lnr lnr-arrow-right"></span>Meat and Fish<span class="number">(53)</span></a>
                        <ul class="collapse" id="meatFish" data-toggle="collapse" aria-expanded="false" aria-controls="meatFish">
                            <li class="main-nav-list child"><a href="#">Frozen Fish<span class="number">(13)</span></a></li>
                            <li class="main-nav-list child"><a href="#">Dried Fish<span class="number">(09)</span></a></li>
                            <li class="main-nav-list child"><a href="#">Fresh Fish<span class="number">(17)</span></a></li>
                            <li class="main-nav-list child"><a href="#">Meat Alternatives<span class="number">(01)</span></a></li>
                            <li class="main-nav-list child"><a href="#">Meat<span class="number">(11)</span></a></li>
                        </ul>
                    </li>
                    <li class="main-nav-list"><a data-toggle="collapse" href="#cooking" aria-expanded="false" aria-controls="cooking"><span
                             class="lnr lnr-arrow-right"></span>Cooking<span class="number">(53)</span></a>
                        <ul class="collapse" id="cooking" data-toggle="collapse" aria-expanded="false" aria-controls="cooking">
                            <li class="main-nav-list child"><a href="#">Frozen Fish<span class="number">(13)</span></a></li>
                            <li class="main-nav-list child"><a href="#">Dried Fish<span class="number">(09)</span></a></li>
                            <li class="main-nav-list child"><a href="#">Fresh Fish<span class="number">(17)</span></a></li>
                            <li class="main-nav-list child"><a href="#">Meat Alternatives<span class="number">(01)</span></a></li>
                            <li class="main-nav-list child"><a href="#">Meat<span class="number">(11)</span></a></li>
                        </ul>
                    </li>
                    <li class="main-nav-list"><a data-toggle="collapse" href="#beverages" aria-expanded="false" aria-controls="beverages"><span
                             class="lnr lnr-arrow-right"></span>Beverages<span class="number">(24)</span></a>
                        <ul class="collapse" id="beverages" data-toggle="collapse" aria-expanded="false" aria-controls="beverages">
                            <li class="main-nav-list child"><a href="#">Frozen Fish<span class="number">(13)</span></a></li>
                            <li class="main-nav-list child"><a href="#">Dried Fish<span class="number">(09)</span></a></li>
                            <li class="main-nav-list child"><a href="#">Fresh Fish<span class="number">(17)</span></a></li>
                            <li class="main-nav-list child"><a href="#">Meat Alternatives<span class="number">(01)</span></a></li>
                            <li class="main-nav-list child"><a href="#">Meat<span class="number">(11)</span></a></li>
                        </ul>
                    </li>
                    <li class="main-nav-list"><a data-toggle="collapse" href="#homeClean" aria-expanded="false" aria-controls="homeClean"><span
                             class="lnr lnr-arrow-right"></span>Home and Cleaning<span class="number">(53)</span></a>
                        <ul class="collapse" id="homeClean" data-toggle="collapse" aria-expanded="false" aria-controls="homeClean">
                            <li class="main-nav-list child"><a href="#">Frozen Fish<span class="number">(13)</span></a></li>
                            <li class="main-nav-list child"><a href="#">Dried Fish<span class="number">(09)</span></a></li>
                            <li class="main-nav-list child"><a href="#">Fresh Fish<span class="number">(17)</span></a></li>
                            <li class="main-nav-list child"><a href="#">Meat Alternatives<span class="number">(01)</span></a></li>
                            <li class="main-nav-list child"><a href="#">Meat<span class="number">(11)</span></a></li>
                        </ul>
                    </li>
                    <li class="main-nav-list"><a href="#">Pest Control<span class="number">(24)</span></a></li>
                    <li class="main-nav-list"><a data-toggle="collapse" href="#officeProduct" aria-expanded="false" aria-controls="officeProduct"><span
                             class="lnr lnr-arrow-right"></span>Office Products<span class="number">(77)</span></a>
                        <ul class="collapse" id="officeProduct" data-toggle="collapse" aria-expanded="false" aria-controls="officeProduct">
                            <li class="main-nav-list child"><a href="#">Frozen Fish<span class="number">(13)</span></a></li>
                            <li class="main-nav-list child"><a href="#">Dried Fish<span class="number">(09)</span></a></li>
                            <li class="main-nav-list child"><a href="#">Fresh Fish<span class="number">(17)</span></a></li>
                            <li class="main-nav-list child"><a href="#">Meat Alternatives<span class="number">(01)</span></a></li>
                            <li class="main-nav-list child"><a href="#">Meat<span class="number">(11)</span></a></li>
                        </ul>
                    </li>
                    <li class="main-nav-list"><a data-toggle="collapse" href="#beauttyProduct" aria-expanded="false" aria-controls="beauttyProduct"><span
                             class="lnr lnr-arrow-right"></span>Beauty Products<span class="number">(65)</span></a>
                        <ul class="collapse" id="beauttyProduct" data-toggle="collapse" aria-expanded="false" aria-controls="beauttyProduct">
                            <li class="main-nav-list child"><a href="#">Frozen Fish<span class="number">(13)</span></a></li>
                            <li class="main-nav-list child"><a href="#">Dried Fish<span class="number">(09)</span></a></li>
                            <li class="main-nav-list child"><a href="#">Fresh Fish<span class="number">(17)</span></a></li>
                            <li class="main-nav-list child"><a href="#">Meat Alternatives<span class="number">(01)</span></a></li>
                            <li class="main-nav-list child"><a href="#">Meat<span class="number">(11)</span></a></li>
                        </ul>
                    </li>
                    <li class="main-nav-list"><a data-toggle="collapse" href="#healthProduct" aria-expanded="false" aria-controls="healthProduct"><span
                             class="lnr lnr-arrow-right"></span>Health Products<span class="number">(29)</span></a>
                        <ul class="collapse" id="healthProduct" data-toggle="collapse" aria-expanded="false" aria-controls="healthProduct">
                            <li class="main-nav-list child"><a href="#">Frozen Fish<span class="number">(13)</span></a></li>
                            <li class="main-nav-list child"><a href="#">Dried Fish<span class="number">(09)</span></a></li>
                            <li class="main-nav-list child"><a href="#">Fresh Fish<span class="number">(17)</span></a></li>
                            <li class="main-nav-list child"><a href="#">Meat Alternatives<span class="number">(01)</span></a></li>
                            <li class="main-nav-list child"><a href="#">Meat<span class="number">(11)</span></a></li>
                        </ul>
                    </li>
                    <li class="main-nav-list"><a href="#">Pet Care<span class="number">(29)</span></a></li>
                    <li class="main-nav-list"><a data-toggle="collapse" href="#homeAppliance" aria-expanded="false" aria-controls="homeAppliance"><span
                             class="lnr lnr-arrow-right"></span>Home Appliances<span class="number">(15)</span></a>
                        <ul class="collapse" id="homeAppliance" data-toggle="collapse" aria-expanded="false" aria-controls="homeAppliance">
                            <li class="main-nav-list child"><a href="#">Frozen Fish<span class="number">(13)</span></a></li>
                            <li class="main-nav-list child"><a href="#">Dried Fish<span class="number">(09)</span></a></li>
                            <li class="main-nav-list child"><a href="#">Fresh Fish<span class="number">(17)</span></a></li>
                            <li class="main-nav-list child"><a href="#">Meat Alternatives<span class="number">(01)</span></a></li>
                            <li class="main-nav-list child"><a href="#">Meat<span class="number">(11)</span></a></li>
                        </ul>
                    </li>
                    <li class="main-nav-list"><a class="border-bottom-0" data-toggle="collapse" href="#babyCare" aria-expanded="false"
                         aria-controls="babyCare"><span class="lnr lnr-arrow-right"></span>Baby Care<span class="number">(48)</span></a>
                        <ul class="collapse" id="babyCare" data-toggle="collapse" aria-expanded="false" aria-controls="babyCare">
                            <li class="main-nav-list child"><a href="#">Frozen Fish<span class="number">(13)</span></a></li>
                            <li class="main-nav-list child"><a href="#">Dried Fish<span class="number">(09)</span></a></li>
                            <li class="main-nav-list child"><a href="#">Fresh Fish<span class="number">(17)</span></a></li>
                            <li class="main-nav-list child"><a href="#">Meat Alternatives<span class="number">(01)</span></a></li>
                            <li class="main-nav-list child"><a href="#" class="border-bottom-0">Meat<span class="number">(11)</span></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
               </div>
        <div class="col-xl-9 col-lg-8 col-md-7">
            <!-- Start Filter Bar -->
            <div class="filter-bar d-flex flex-wrap align-items-center">
                <div class="sorting">
                    <select>
                        <option value="1">Default sorting</option>
                        <option value="1">Default sorting</option>
                        <option value="1">Default sorting</option>
                    </select>
                </div>
                <div class="sorting mr-auto">
                    <select>
                        <option value="1">Show 12</option>
                        <option value="1">Show 12</option>
                        <option value="1">Show 12</option>
                    </select>
                </div>
                <div class="pagination">
                    <a href="#" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
                    <a href="#" class="active">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
                    <a href="#">6</a>
                    <a href="#" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                </div>
            </div>
            <!-- End Filter Bar -->
            <!-- Start Best Seller -->
            <section class="lattest-product-area pb-40 category-list">
                <div class="row">
                    <!-- single product -->
                @foreach ($products as $product)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-product">
                            <img class="img-fluid" src="{{ asset('public/assets/product/' . $product->image) }}" alt="">
                            <div class="product-details">
                                <h6>{{ $product->name }}</h6>
                                <div class="price">
                                    <h6>{{ $product->price }}</h6>
                                </div>
                                <div class="prd-bottom">
                                    <a href="{{ route('add-to-cart', $product->id) }}" class="social-info">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">giỏ hàng</p>
                                    </a>
                                    <a href="{{route('showsanpham',$product->id)}}" class="social-info">
                                        <span class="lnr lnr-move"></span>
                                        <p class="hover-text">chi tiết</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>

        </div>
    </div>
</div>
@endsection
