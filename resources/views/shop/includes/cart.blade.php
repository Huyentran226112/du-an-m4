@extends('shop.layouts.master')
@section('content')


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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).on('click', '.update-cart' ,function (e) {
        e.preventDefault();
        var ele = $(this);
        $.ajax({
            url: '{{ route("update-cart")}}',
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
                url: '{{ route("remove-from-cart") }}',
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