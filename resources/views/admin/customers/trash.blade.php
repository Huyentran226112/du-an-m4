@extends('admin.layouts.master')
@section('content')
<table class="table" style="text-align: center;" >
    <h1 style="text-align: center; color: black;">Thùng rác</h1>
    <thead>
        <tr>
        <th scope="col">Số thứ tự</th>
        <th scope="col">Tên</th>
        <th scope="col">Địa chỉ</th>
        <th scope="col">Số điện thoại</th>
        <th scope="col">Email</th>
    </thead>
    <tbody>
        @foreach($softs as $key => $soft)
        <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $soft->name }}</td>
            <td>{{ $soft->address}}</td>
            <td>{{ $soft->email  }}</td>
            <td>{{ $soft->password }}</td>
            <td>{{ $soft->phone }}</td>
            <td>
                <a href="{{route('customers.restore',[$soft->id])}}" class="btn btn-warning">Khôi phục</a>
                <a href="{{route('customers.deleteforever',[$soft->id])}}" onclick="return confirm('Bạn có chắc chắn xóa vĩnh viễn không?');" class="btn btn-secondary">Xóa vĩnh viễn</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ route('customers.index') }}" class="btn btn-info">Trở lại</a> <br>
@endsection
