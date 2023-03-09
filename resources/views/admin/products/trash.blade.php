@extends('admin.layouts.master')
@section('content')
@include('sweetalert::alert')

<table class="table" style="text-align: center;" >
    <h1 style="text-align: center; color: black;">Thùng rác</h1>
    <thead>
        <tr>
            <th scope="col">Số thứ tự</th>
            <th scope="col">Tên</th>
            <th scope="col">giá</th>
            <th scope="col">số lượng</th>
            <th scope="col">thể loại</th>
            <th scope="col">mô tả </th>
            <th scope="col">ảnh</th>
            <th scope="col">trạng thái</th>
            <th scope="col">Công cụ</th>
    </thead>
    <tbody>
        @foreach($softs as $key => $soft)
        <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $soft->name }}</td>
            <td>{{ $soft->price}}</td>
            <td>{{ $soft->quantity}}</td>
            <td>{{ $soft->category_id}}</td>
            <td>{!! $soft->description !!}</td>
            <td>
                <a  href="{{ route('products.show',$soft['id']) }}">
                <img src="{{ asset('public/assets/product/' . $soft->image) }}" alt=""
                    style="width: 50px">
                </a>
            </td>
            <td>{{ $soft->status == 1 ? ' Active' : 'No Active' }}</td>

            <td>

                <a href="{{route('products.restore',[$soft->id])}}" class="btn btn-warning">Khôi phục</a>
                <a href="{{route('products.deleteforever',[$soft->id])}}" onclick="return confirm('Bạn có chắc chắn xóa vĩnh viễn không?');" class="btn btn-secondary">Xóa vĩnh viễn</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ route('products.index') }}" class="btn btn-info">Trở lại</a> <br>
@endsection
