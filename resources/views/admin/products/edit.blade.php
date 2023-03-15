@extends('admin.layouts.master')
@section('content')
<main id="main">
    @include('sweetalert::alert')
    <h1>Chỉnh sửa sản phẩm</h1>
    <form  action="{{route('products.update',[$product->id])}}" method="POST"  enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label class="form-label">Tên danh mục</label>
            <input type="text" name="name" value='{{$product->name}}' class="form-control">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
            </div>

            <div class="mb-3">
            <label class="form-label">Giá</label>
            <input type="text" name="price" value='{{$product->price}}' class="form-control">
            @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Số lượng</label>
            <input type="text" name="quantity" value='{{$product->quantity}}' class="form-control">
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
            <label class="form-label">Mô tả</label>
            <textarea class="form-control" placeholder="Miêu tả" id="editor"  name="description" rows="4" cols="4">{{$product->description}}</textarea>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>

        <div class="mb-3">

            <label class="form-label">Ảnh</label>
            <input type="file" name="image" value='{{$product->image}}' class="form-control">
            @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Trạng thái</label>
            <select name="status" class="form-select" id="inputGroupSelect02">
                @if($product->status==0)
                    <option selected value="1">Hoạt động<table></table></option>
                    <option value="0">Không hoạt động</option>
                @else($product->status==1)
                    <option  value="1">Hoạt động<table></table></option>
                    <option selected value="0">Không hoạt động</option>
                @endif
                </select>
                @error('status')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        <input type="submit" value="Cập nhật" class="btn btn-primary">
        <a href="{{route('products.index')}}" class="btn btn-danger">Huỷ</a><br>
      </form>
      </main>
@endsection
