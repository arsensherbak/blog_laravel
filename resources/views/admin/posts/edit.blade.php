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
                        <li class="breadcrumb-item active">Редактирование поста</li>
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

                <form action="{{route('admin.post.update', $post->id)}}"
                      class="w-75" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group w-25">
                        <input type="text"
                               name="title"
                               class="form-control"
                               placeholder="название поста"
                               value="{{$post->title}}">
                        @error('title')
                        <div class="text-danger">Введите название</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea id="summernote" name="content">{{$post->content}}</textarea>
                        @error('content')
                        <div class="text-danger">Введите название</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Добавить изображение</label>
                        <div class="w-25">
                            <img src="{{ url('storage/'.$post->image)}}" alt="image" class="w-50">
                        </div>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image">
                                <label class="custom-file-label" for="exampleInputFile">Выберите изображение</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">загрузить</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Добавить изображение</label>
                        <div class="w-25">
                            <img src="{{ url('storage/'.$post->image_key)}}" alt="image" class="w-50">
                        </div>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image_key">
                                <label class="custom-file-label" for="exampleInputFile">Выберите изображение</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">загрузить</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Select</label>
                        <select class="form-control" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}"
                                    {{$category->id == $post->category_id ? 'selected' : ''}}
                                >
                                    {{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Multiple</label>
                        <select class="select2" multiple="multiple"
                                data-placeholder="Выберите теги" style="width: 100%;"
                                name="tags_ids[]">
                            @foreach($tags as $tag)
                                <option {{ is_array( $post->tags->pluck('id')->toArray() ) && in_array($tag->id, $post->tags->pluck('id')->toArray() ) ? 'selected' : '' }}
                                        value="{{$tag->id}}">{{$tag->title}}</option>
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
