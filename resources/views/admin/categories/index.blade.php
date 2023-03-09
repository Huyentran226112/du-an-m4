@extends('admin.layouts.master')
@section('content')
<h3>Danh sách thể loại</h3>
@include('sweetalert::alert')

<a class="btn btn-primary" href="{{route('categories.create')}}"><i class="bi bi-plus-circle"></i></a>
<a class="btn btn-primary" href="{{route('categories.trash')}}"><i class="bi bi-recycle"></i></a>
<table class="table"style="text-align:center">
    <thead>
      <tr>
        <th scope="col">Số thứ tự</th>
        <th scope="col">Tên</th>
        <th scope="col">Ảnh</th>
        <th scope="col">Công cụ</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($categories as $key => $category)
        <tr>
            <td> {{ ++ $key}}</td>
            <td> {{$category['name']}}</td>
            <td>
                <a href="{{ route('products.show', $category['id']) }}">
                    <img src="{{ asset('public/assets/category/' . $category->image) }}" alt=""
                        style="width: 50px">
                </a>
            </td>
            <td>
                <form action="{{route('categories.destroy',[$category->id])}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button onclick="return confirm('Bạn có muốn xóa này không?');" class="btn btn-danger"><i class="bi bi-trash3"></i></button>
                    </form>
               <a class="btn btn-primary" href="{{ route('categories.edit',$category['id']) }}"><i class="bi bi-pencil-square"></i></a>
            </td>
          </tr>
@endforeach
@endsection



