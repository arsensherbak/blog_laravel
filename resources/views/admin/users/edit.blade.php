@extends('admin.layouts.main')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Редактирование пользователя</li>
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

                <form action="{{route('admin.user.update', $user->id)}}" class="w-25" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <input type="text"
                               name="name"
                               class="form-control"
                               placeholder="имя пользователя"
                               value="{{$user->name}}"
                        >
                        @error('title')
                            <div class="text-danger">Введите название</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text"
                               name="email"
                               class="form-control"
                               placeholder="имя пользователя"
                               value="{{$user->email}}"
                        >
                        @error('email')
                        <div class="text-danger">Введите название</div>
                        @enderror
                    </div>
                    <input type="submit" value="обновить">
                </form>

                <!-- /.col -->
            </div>

        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
