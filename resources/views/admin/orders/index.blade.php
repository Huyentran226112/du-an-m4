@extends('admin.layouts.master')
@section('content')
<main class="page-content">
<section class="wrapper">
    <div class="panel-panel-default">
        <div class="market-updates">
            <div class="container">
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Đơn hàng</h1>
      <hr>
    </div>
    <table class="table"style="text-align:center">
        <thead>
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên Khách Hàng</th>
            <th scope="col">Email</th>
            <th scope="col">Số Điện Thoại</th>
            <th scope="col">Địa Chỉ</th>
            <th scope="col">Ngày Đặt Hàng</th>
            <th scope="col">Tùy Chọn</th>
          </tr>
        </thead>
        <tbody id="list-users">
            @foreach ($items as $key=> $item)
          <tr>
            <th scope="row">{{++$key}}</th>
            <td>{{$item->customer->name}}</td>
            <td>{{$item->customer->email}}</td>
            <td>{{$item->customer->phone}}</td>
            <td>{{$item->customer->address}}</td>
            <td>{{$item->date_at}}</td>
            <td>
                <a class="btn btn-primary" href="{{ route('orders.show',$item->id) }}"><i class="bi bi-ticket-detailed-fill"></i></a>

            </td>
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
