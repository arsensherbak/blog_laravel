@extends('admin.layouts.main')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <h1 class="m-0"> Добавление пользователя</h1>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v2</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">

                <form action="{{route('admin.user.store')}}" class="w-25" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text"
                               name="name"
                               class="form-control"
                               placeholder="имя пользователя">
                        @error('name')
                            <div class="text-danger">Введите название</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text"
                               name="email"
                               class="form-control"
                               placeholder="введите електронную почту">
                        @error('email')
                        <div class="text-danger">Введите електронную почту</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Выберите пользователя</label>
                        <select class="form-control"
                                name="role">
                            @foreach($roles as $id => $role)
                                <option
                                    {{ $id == old('role') ? ' selected' : '' }}
                                    value="{{$id}}">{{$role}}</option>
                            @endforeach

                        </select>
                    </div>
                    <input type="submit" value="отправить">
                </form>

                <!-- /.col -->
            </div>

        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
