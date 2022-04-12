@extends('personal.layouts.main')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Коменти</h1>
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
                <div>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 10px">id</th>
                            <th>Описание категории</th>
                            <th>Действие</th>
                            <th>Удаление</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $comment)
                            <tr>

                                <td>
                                    <span>{{$comment->id}}</span>
                                </td>
                                <td><span>{{$comment->message}}</span></td>
                                <td><a href="{{route('personal.comment.edit', $comment->id)}}" class="text-success">
                                        <i class="fas fa-pencil-alt"></i></a></td>
                                <td>
                                    <form action="{{route('personal.comment.delete', $comment->id)}}"
                                          method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="text-danger border-0 bg-transparent">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
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
