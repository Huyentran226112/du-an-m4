@extends('admin.layouts.master')
@section('content')
@include('sweetalert::alert')
<a class="btn btn-primary" href="{{route('users.create')}}"><i class="bi bi-plus-circle"></i></a>
<table class="table" style="text-align:center">
    <thead>
        <tr>
            <th scope="col">Số thứ tự</th>
            <th scope="col">Tên</th>
            <th scope="col">email </th>
            <th scope="col">Chức vụ</th>
            <th scope="col">Công cụ</th>
        </tr>
    </thead>
    <tbody id="list-users">
        @foreach ($users as $key => $user)
        <tr>
            <td> {{ ++ $key}}</td>
            <td> {{$user->name}}</td>
            <td> {{$user->email}}</td>
            <td> {{ isset($user->group->name) ? $user->group->name : 'chưa phân quyền'  }}</td>
            <td>
                <form action="{{route('users.destroy',$user->id)}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button onclick="return confirm('Bạn có muốn xóa này không?');" class="btn btn-danger">
                        <i class="bi bi-trash3"></i>
                    </button>
                </form>
                <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}"><i
                        class="bi bi-pencil-square"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $users->onEachSide(5)->links()}}
@endsection