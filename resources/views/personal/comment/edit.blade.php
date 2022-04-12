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

                <form action="{{route('personal.comment.update', $comment->id)}}" class="w-25" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <textarea name="message" cols="30" rows="10" class="'form-control">{{$comment->message}}</textarea>
                        @error('message')
                        <div class="text-danger">Необходимо заполнить</div>
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
