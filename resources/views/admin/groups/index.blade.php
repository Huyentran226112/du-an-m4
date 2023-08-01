@extends('admin.layouts.master')
@section('content')
<h3>Danh sách thể loại</h3>
<a class="btn btn-primary" href="{{route('groups.create')}}"><i class="bi bi-plus-circle"></i> </a>
<table class="table" style="text-align:center">
    <thead>
      <tr>
        <th scope="col">Số thứ tự</th>
        <th scope="col">Tên</th>
        <th scope="col">Người đảm nhận </th>
        <th scope="col">Quản lý</th>

      </tr>
    </thead>
    <tbody>
        @foreach ($groups as $key => $group)
        <tr>
            <td> {{$group['id']}}</td>
            <td> {{$group['name']}}</td>
            <td>Hiện có {{count($group->users) }} người</td>
            <td>
                <form action="{{route('groups.destroy',[$group->id])}}" method="post">
                    @method('DELETE')
                    @csrf
                    <a class="btn btn-primary" href="{{ route('groups.edit',$group['id']) }}"><i class="bi bi-trash3"></i></a>
                    <a class="btn btn-primary " href="{{route('group.detail', $group->id)}}">Trao Quyền</a>
                    <button onclick="return confirm('Bạn có muốn xóa này không?');" class="btn btn-danger"><i class="bi bi-pencil-square"></i></button>
                    </form>
            </td>
          </tr>
@endforeach
@endsection
