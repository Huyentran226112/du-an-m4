@extends('admin.layouts.master')
@section('content')
    @include('sweetalert::alert')

    <table class="table" style="text-align: center;">
        <h1 style="text-align: center; color: black;">Thùng rác</h1>
        <thead>
            <tr>
                <th scope="col">Số thứ tự</th>
                <th scope="col">Tên</th>
                <th scope="col">Công cụ</th>
        </thead>
        <tbody>
            @foreach ($softs as $key => $soft)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $soft->name }}</td>
                    <td>
                        <a href="{{ route('cate.restore', [$soft->id]) }}" class="btn btn-warning">Khôi phục</a>
                        <a href="{{ route('categories.force-delete', [$soft->id]) }}"
                            onclick="return confirm('Bạn có chắc chắn xóa vĩnh viễn không?');" class="btn btn-secondary">Xóa vĩnh
                            viễn</a>
                    </td>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('categories.index') }}" class="btn btn-info">Trở lại</a> <br>
@endsection
