@extends('shop.layouts.master')
@section('content')
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- Site Title -->
    <title>Karma Shop</title>

    <!--
            CSS
            ============================================= -->
    {{-- <link rel="stylesheet" href="{{ asset('shop/css/linearicons.css')}}">
    <link rel="stylesheet" href="{{ asset('shop/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{ asset('shop/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('shop/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('shop/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{ asset('shop/css/nouislider.min.css')}}">
    <link rel="stylesheet" href="{{ asset('shop/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset('shop/css/main.css')}}"> --}}
</head>

<body>

    <br>
    <h1 style="text-align: center;width:100%" class="table table-hover table-condensed">GIỎ HÀNG</h1>

    <table id="cart" style="text-align: center;width:100%" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:20%">Hãng xe</th>
                <th style="width:20%">Ảnh</th>
                <th style="width:10%">Giá</th>
                <th style="width:8%">Số lượng</th>
                <th style="width:22%" class="text-center">Tổng tiền</th>
                <th style="width:10%">công cụ</th>
            </tr>
        </thead>
        <tbody style="text-align: center;width:100%">
            <?php $total = 0 ?>
            @if(session('cart'))
            @foreach(session('cart') as $id => $details)
            <?php $total += $details['price'] * $details['quantity'] ?>
            <tr>
                <td>
                    <p class="nomargin">{{ $details['name'] }}</p>
                </td>
                <td data-th="Product">

                    @if ( isset($details['image']))
                    <img src="{{ 'public/assets/product/' . $details['image'] }}" width="100" height="100"
                        class="img-responsive" />
                    @else
                    không có ảnh
                    @endif
                </td>
                <td data-th="Price">{{ number_format($details['price'] )}}vnđ</td>
                <td data-th="Quantity">
                    <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" />
                </td>
                <td data-th="Subtotal" class="text-center">
                    {{ number_format( $details['price'] * $details['quantity'] )}}vnđ</td>
                <td class="actions" data-th="">
                    <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i
                            class="fa fa-refresh"></i></button>
                    <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i
                            class="fa fa-trash-o"></i></button>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr>
                <td><a href="{{ route('shop.index') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp
                        tục mua sắm </a></td>
                @if (session('cart'))
                <a href="{{ route('checkOuts') }}" class="btn btn-danger pull-right">Thanh toán</a>
                @endif
                <td colspan="2" class="hidden-xs"></td>
                <td class="hidden-xs text-center"><strong>Tổng tiền {{number_format( $total )}}vnđ</strong></td>
            </tr>
        </tfoot>
    </table>
    @endsection
    @section('scripts')
    <script type="text/javascript">
    $(".update-cart").click(function(e) {
        e.preventDefault();
        var ele = $(this);
        $.ajax({
            url: '{{ url('
            update - cart ') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: ele.attr("data-id"),
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function(response) {
                window.location.reload();
            }
        });
    });
    $(".remove-from-cart").click(function(e) {
        e.preventDefault();
        var ele = $(this);
        if (confirm("Are you sure")) {
            $.ajax({
                url: '{{ url('
                remove - from - cart ') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.attr("data-id")
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        }
    });
    </script>
    @endsection