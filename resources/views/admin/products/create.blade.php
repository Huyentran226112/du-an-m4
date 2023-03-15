@extends('admin.layouts.master')
@section('content')
<main id="main">
    @include('sweetalert::alert')
    <h1>Thêm sản phẩm</h1>
    <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Tên :</label>
            <input type="text" id="fname" name="name" class="form-control">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">giá :</label>
            <input type="number" id="fname" name="price" class="form-control">
            @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">số lượng :</label>
            <input type="number" id="fname" name="quantity" class="form-control">
            @error('quantity')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Thể loại</label>
            <select name="category_id" id="" class="form-control">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Mô tả:</label>
            <textarea class="form-control" type="text" id="editor" placeholder="Mô tả" name="description" ></textarea>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Ảnh</label>
            <input class="form-control" name="image" type="file">
            @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Trạng thái :</label>
            <select name="status" class="form-select" >
                <option value="">-----Vui lòng chọn-----</option>
                <option value="1">Hoạt động</option>
                <option value="0">Không hoạt động</option>
            </select>
            @error('status')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        <input type="submit" value="Lưu" class="btn btn-success">
        <a href="{{route('products.index')}}" class="btn btn-danger">Huỷ</a>
      </form>
      </main>
@endsection
