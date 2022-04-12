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
                    <div class="col-12">
                        <a href="{{route('category.create')}}" class="btn btn-block btn-primary">Добавить</a>
                    </div>
                    <div class="col-12">
                        Категории
                    </div>
                    <div>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px">id</th>
                                <th>Описание категории</th>
                                <th>Действие</th>
                                <th>Редактирование</th>
                                <th>Удаление</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>

                                    <td>
                                        <span>{{$category->id}}</span>
                                    </td>
                                    <td><span>{{$category->title}}</span></td>
                                    <td><a href="{{route('admin.category.show', $category->id)}}"><i
                                                class="far fa-eye"></i></a></td>
                                    <td><a href="{{route('admin.category.edit', $category->id)}}" class="text-success">
                                            <i class="fas fa-pencil-alt"></i></a></td>
                                    <td>
                                        <form action="{{route('admin.category.delete', $category->id)}}"
                                              method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-danger border-0 bg-transparent"><i class="far fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>

            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
