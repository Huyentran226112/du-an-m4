<table>
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Địa chỉ
                        giao hàng</span></h5>
                <form class="checkout-form" method="POST" action="{{ route('order') }}">
                    @csrf
                    @if (isset(Auth()->guard('customers')->user()->name))
                    <div class="bg-light p-30">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Họ Và Tên</label>
                                <input name="name" class="form-control" type="text" placeholder="John"
                                    value="{{ Auth()->guard('customers')->user()->name }}" id="full_name"
                                    placeholder="">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Email</label>
                                <input name="email" class="form-control" type="text" placeholder="example@email.com"
                                    value="{{ Auth()->guard('customers')->user()->email }}" id="user_city">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Số điện thoại</label>
                                <input name="phone" class="form-control" type="text" placeholder="+123 456 789"
                                    value="{{ Auth()->guard('customers')->user()->phone }}" id="user_post_code">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Địa chỉ </label>
                                <input name="address" class="form-control" type="text" placeholder="123 Street"
                                    value="{{ Auth()->guard('customers')->user()->address }}" id="user_address"
                                    placeholder="">
                            </div>
                            <button type="submit" class="btn btn-block btn-primary font-weight-bold py-3">Đặt
                                hàng</button>
                            @else
                            <h4>Vui lòng đăng nhập trước khi thanh toán nhé</h4>
                            <a href="{{ route('login.index') }}" class="btn btn-danger">Đăng Nhập</a>
                            @endif
                            @php

                            $totalAll = 0

                            @endphp

                            <div class="block">

                                <h4 class="widget-title">Tóm Tắt</h4>
                                <div class="bg-light p-30 mb-5">
                                    <div class="border-bottom">
                                        @if (session('cart'))
                                        @foreach (session('cart') as $id => $details)
                                        @php
                                        $total = $details['price'] * $details['quantity'];
                                        $totalAll += $total


                                        @endphp
                                        <div>
                                            <h6 class="mb-3">Sản phẩm</h6>
                                            <div class="d-flex justify-content-between">
                                                <p> <input type="hidden" value="{{ $id }}"
                                                        name="product_id[]">{{ $details['nameVi'] ?? '' }}
                                                </p>
                                                </td>
                                                <input type="hidden" value="{{ $details['quantity'] }}"
                                                    name="quantity[]">
                                                <input type="hidden" value="{{ $total }}" name="total[]">

                                            </div>
                                        </div>

                                        <div class="border-bottom pt-3 pb-2">
                                            <div class="d-flex justify-content-between mb-3">
                                                <h6>Tổng phụ</h6>
                                                <h6>{{number_format( $total) }} Vnd </h6>
                                            </div>

                                        </div>
                                        <div class="pt-2">
                                            <div class="d-flex justify-content-between mt-2">
                                                <h5>Tổng tiền</h5>
                                                <h5>{{ number_format($total) }} Vnd </h5>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="discount-code">
                                        @endforeach
                                        @endif
                                        <div class="pt-2">
                                            <div class="d-flex justify-content-between mt-2">
                                                <h5>Số tiền cần trả : {{number_format( $totalAll) }} Vnd </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                </form>

            </div>

        </div>
    </div>

</table>