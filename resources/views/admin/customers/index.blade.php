@extends('admin.layouts.master')
@section('content')
<h3>Danh sách khách hàng </h3>
<table class="table">
    <thead>
      <tr>
        <th scope="col">Số thứ tự</th>
        <th scope="col">Tên</th>
        <th scope="col">Địa chỉ</th>
        <th scope="col">Số điện thoại</th>
        <th scope="col">Email</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($customers as $key => $customer)
        <tr>
            <td> {{++$key}}</td>
            <td> {{$customer->name}}</td>
            <td> {{$customer->address}}</td>
            <td> {{$customer->phone}}</td>
            <td> {{$customer->email}}</td>
          </tr>
@endforeach
@endsection
