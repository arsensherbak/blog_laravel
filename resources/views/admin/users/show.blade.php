@extends('admin.layouts.main')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard v2</h1>
                    </div><!-- /.col -->
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

                    <div class="col-12 d-flex align-items-center">
                        <h4 class="mr-2">Название категории</h4>
                        <a href="{{route('admin.user.edit', $user->id)}}" class="text-success"><i class="fas fa-pencil-alt"></i></a>
                    </div>
                    <div  class="col-4">
                        <table class="table table-bordered">
                            <tbody>
                                <tr class="col-4">
                                    <td>
                                        <span >ID</span>
                                    </td>
                                    <td>
                                        <span >{{$user->id}}</span>
                                    </td>
                                </tr>
                            <tr>

                                <td><span >Имя</span></td>
                                <td><span >{{$user->name}}</span></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
