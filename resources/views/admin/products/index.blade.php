@extends('admin.layouts.master')
@section('content')
@include('sweetalert::alert')
<h3>Danh sách sản phẩm </h3>
<a class="btn btn-primary" href="{{ route('products.create') }}"><i class="bi bi-card-list"></i></a>
<a class="btn btn-primary" href="{{route('products.trash')}}"><i class="bi bi-recycle"></i></a>
<table class="table" style="text-align:center">
    <thead>
        <tr>
            <th scope="col">Mã hàng</th>
            <th scope="col">Tên</th>
            <th scope="col">giá</th>
            <th scope="col">thể loại</th>
            <th scope="col">ảnh</th>
            <th scope="col">trạng thái</th>
            <th scope="col">Công cụ</th>
        </tr>
    </thead>
    <tbody id="list-users">
        @foreach ($products as $key =>$product)
        <tr>

            <td> {{ ++$key }}</td>
            <td> {{ $product->name }}</td>
            <td> {{ number_format($product->price) }} vnđ</d>
                {{-- @php
                        dd($product->category->name);
                    @endphp --}}
            <td> {{ isset($product->category->name) ? $product->category->name : 'Chưa phân loại '  }}</td>

            <td>
                <a href="{{ route('products.show', $product['id']) }}">
                    <img src="{{ asset('public/assets/product/' . $product->image) }}" alt="" style="width: 50px">
                </a>
            </td>
            <td>{{ $product->status == 1 ? ' bật' : 'tắt' }}</td>
            <td>
                <form action="{{ route('products.destroy', [$product->id]) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <a class="btn btn-primary" href="{{ route('products.edit', $product['id']) }}"><i
                            class="bi bi-pencil-square"></i></a>
                    <button onclick="return confirm('Bạn có muốn xóa này không?');" class="btn btn-danger"><i
                            class="bi bi-trash3"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $products->onEachSide(5)->links() }}
@endsection
