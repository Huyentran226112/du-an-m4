@extends('admin.layouts.master')
@section('content')
<main class="page-content">
    <section class="wrapper">
        <div class="panel-panel-default">
            <div class="market-updates">
                <div class="container">
                    <main id="main" class="main">
                        <div class="pagetitle">
                            <h1>Chi tiết đơn hàng</h1>
                            <a class="btn btn-primary" href="{{ route('orders.index') }}">Đơn hàng</a>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên Sản Phẩm</th>
                                    <th scope="col">GIá(Đồng)</th>
                                    <th scope="col">Số Lượng</th>
                                    <th scope="col">Tổng Tiền(Đồng)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $key => $item)
                                    <tr>
                                        <th scope="row">{{ ++$key }}</th>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ number_format($item->price) }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ number_format($item->total) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </main>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
