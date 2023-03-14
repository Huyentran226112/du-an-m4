@extends('admin.layouts.master')
@section('content')
<main id="main">
    @include('sweetalert::alert')
    <h1>Thêm danh mục</h1>
    <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Tên :</label>
            <input type="text" id="fname" name="name" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Email:</label>
            <input type="email" id="fname" name="email" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Mật khẩu</label>
            <input type="password" id="fname" name="password" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Trao quyền</label>
            <select name="group_id" id="" class="form-control">
                <option value="">--Vui lòng chọn--</option>
                @foreach ($groups as $group)
                <option value="{{ $group->id }}">{{ $group->name }}</option>
                @endforeach

            </select>
        </div>
        <input type="submit" value="Lưu" class="btn btn-success">
        <a href="{{route('users.index')}}" class="btn btn-danger">Huỷ</a>
    </form>
</main>
@endsection