@extends('admin.layouts.master')
@section('content')
<main id="main">
    @include('sweetalert::alert')
    <h1>Chỉnh sửa sản phẩm</h1>
    <form action="{{route('users.update',[$users->id])}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label class="form-label">Tên </label>
            <input type="text" name="name" value='{{$users->name}}' class="form-control">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
            </div> 
        <div class="mb-3">
            <label class="form-label">email</label>
            <input type="text" name="email" value='{{$users->email }}' class="form-control">
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
            </div> 
            <div class="mb-3">
            <select name="group_id" id="" class="form-control">
                @foreach ($groups as $group)
            <option value="{{ $group->id }}">{{ $group->name }}</option>
                @endforeach
                @error('group_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        <input type="submit" value="Cập nhật" class="btn btn-primary">
        <a href="{{route('users.index')}}" class="btn btn-danger">Huỷ</a><br>
    </form>
</main>
@endsection