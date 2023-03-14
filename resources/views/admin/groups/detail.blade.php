@extends('admin.layouts.master')
@section('content')
<main class="page-content">
    <div class="container">
        <section class="wrapper">
            <main id="main" class="main">
                <div class="panel-panel-default">
                    <div class="market-updates">
                        <div class="container">
                            <div class="pagetitle">
                                <h1 class="offset-4">Chức Vụ</h1>

                            </div>
                            <div class="page-section">
                                <form method="post" action="{{ route('group.group_detail', $group->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="card">
                                        <div class="card-body">
                                            <hr>
                                            <div class="form-group">
                                                <label for="tf1">Tên Quyền:</label> {{ $group->name }}
                                            </div><br>
                                            <div class="form-group">

                                                <input type="checkbox" id="checkAll" class="form-check-input"
                                                    value="Quyền hạn">
                                                <label class="w3-button w3-blue">{{ __('Cấp toàn bộ quyền') }}
                                                    <div class="row">
                                                        @foreach ($group_names as $group_name => $roles)
                                                            <div class="col-lg-6">
                                                                <div class="list-group-header"
                                                                    style="color:rgb(2, 6, 249) ;">
                                                                    <h5> Nhóm: {{ __($group_name) }}</h5>
                                                                </div>
                                                                @foreach ($roles as $role)
                                                                    <div
                                                                        class="list-group-item d-flex justify-content-between align-items-center">
                                                                        <span
                                                                            style="color: rgb(4, 5, 5) ;">{{ __($role['name']) }}</span>
                                                                        <!-- .switcher-control -->
                                                                        <label class="form-check form-switch ">
                                                                            <input type="checkbox"
                                                                                @checked(in_array($role['id'], $userRoles))
                                                                                name="roles[]"
                                                                                class="checkItem form-check-input checkItem"
                                                                                value="{{ $role['id'] }}">
                                                                            <span class="switcher-indicator"></span>
                                                                        </label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        @endforeach
                                                    </div>
                                            </div>
                                            <div class="form-actions">
                                                <button class="btn btn-success" type="submit">Duyệt</button>
                                                <a href="{{ route('groups.index') }}" class="btn btn-danger"
                                                    type="submit">Hủy</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
            </main>
            <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
            <script>
                $('#checkAll').click(function() {
                    $(':checkbox.checkItem').prop('checked', this.checked);
                });
            </script>
        </section>
    </div>
</main>
@endsection
