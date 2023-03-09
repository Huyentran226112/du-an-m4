@extends('admin.layouts.master')
@section('content')
<h3>Danh sách thể loại</h3>
<a class="btn btn-primary" href="{{route('groups.create')}}">Thêm </a>
<table class="table">
    <thead>
      <tr>
        <th scope="col">Số thứ tự</th>
        <th scope="col">Tên</th>
        <th scope="col">Quản lý</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($groups as $key => $group)
        <tr>
            <td> {{$group['id']}}</td>
            <td> {{$group['name']}}</td>
            <td>
                <form action="{{route('groups.destroy',[$group->id])}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button onclick="return confirm('Bạn có muốn xóa này không?');" class="btn btn-danger">Xóa</button>
                    </form>
               <a class="btn btn-primary" href="{{ route('groups.edit',$group['id']) }}">edit</a>
            </td>
          </tr>
@endforeach
@endsection
