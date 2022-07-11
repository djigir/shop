@extends('layouts.main')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование товара <b>{{ $product->title }}</b></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Товары</a></li>
                        <li class="breadcrumb-item active">Редактирование товара</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">

                <div class="col-12">
                    <form action="{{ route('product.update', $product->id) }}" method="POST" class="w-50" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="title">Название товара</label>
                            <input value="{{ $product->title }}" type="text" id="title" class="form-control" name="title" placeholder="Название товара">
                            @error('title')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Описание</label>
                            <input value="{{ $product->description }}" type="text" id="description" class="form-control" name="description" placeholder="Описание">
                            @error('description')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="content">Контент</label>
                            <textarea name="content" id="content" class="form-control" cols="30" rows="10" placeholder="Контент">{{ $product->content }}</textarea>
                            @error('content')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="price">Цена</label>
                            <input value="{{ $product->price }}" type="text" id="price" class="form-control" name="price" placeholder="Цена">
                            @error('price')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="count">Количество</label>
                            <input value="{{ $product->count }}" type="text" id="count" class="form-control" name="count" placeholder="Количество">
                            @error('count')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="w-75 mb-3">
                                <img src="{{ asset('storage/' . $product->preview_image) }}" alt="preview_image" class="w-50">
                            </div>
                            <label for="exampleInputFile">Изображение</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input name="preview_image" type="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Загрузить</span>
                                </div>
                            </div>
                            @error('preview_image')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        @foreach($product->productImages as $productImage)

                            <div class="form-group">
                                <div class="w-75 mb-3">
                                    <img src="{{ asset('storage/' . $productImage->file_path) }}" alt="preview_image" class="w-50">
                                </div>
                                <label for="exampleInputFile">Изображение</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="preview_image" type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Загрузить</span>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                        <div class="form-group">
                            <label>Категория</label>
                            <select name="category_id" class="form-control select2" style="width: 100%;">
                                <option selected="selected" disabled>Виберите категорию</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == $product->category_id ? 'selected' : '' }}
                                    >{{ $category->title }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Группа</label>
                            <select name="group_id" class="form-control select2" style="width: 100%;">
                                <option selected="selected" disabled>Виберите группу</option>
                                @foreach($groups as $group)
                                    <option value="{{ $group->id }}"
                                        {{ $group->id == $product->group_id ? 'selected' : '' }}
                                    >{{ $group->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Тэги</label>
                            <select name="tags[]" class="tags" multiple="multiple" data-placeholder="Выберите тэги" style="width: 100%;">
                                @foreach($tags as $tag)
                                    <option
                                        {{ is_array( $product->tags->pluck('id')->toArray()) && in_array($tag->id, $product->tags->pluck('id')->toArray()) ? 'selected' : '' }}
                                        value="{{ $tag->id }}">{{ $tag->title }}
                                    </option>
                                @endforeach
                            </select>
                            @error('tags')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Цвет</label>
                            <select name="colors[]" class="colors" id="colorList" multiple="multiple" data-placeholder="Выберите цвета" style="width: 100%;">
                                @foreach($colors as $color)
                                    <option
                                        {{ is_array( $product->colors->pluck('id')->toArray()) && in_array($color->id, $product->colors->pluck('id')->toArray()) ? 'selected' : '' }}
                                        value="{{ $color->id }}">{{ $color->color_code }}
                                    </option>
                                @endforeach
                            </select>
                            @error('colors')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Опубликовать</label>
                            <select name="is_published" class="form-control select2" style="width: 100%;">
                                <option {{ $product->is_published == 1 ? 'selected' : '' }} value="1">Да</option>
                                <option {{ $product->is_published == 0 ? 'selected' : '' }} value="0">Нет</option>
                            </select>
                            @error('is_published')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <input type="submit" class="btn btn-warning" value="Обновить">
                    </form>
                </div>
                <!-- ./col -->

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
