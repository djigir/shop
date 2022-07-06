@extends('layouts.main')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Категория: {{ $product->title }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Категории</a></li>
                        <li class="breadcrumb-item active">{{ $product->title }}</li>
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
                <div class="col-2 mb-4">
                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-block btn-warning">Редактировать</a>
                </div>

                <div class="col-2 mb-4">
                    <form action="{{ route('product.delete', $product->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-block btn-danger">Удалить</button>
                    </form>
                </div>

                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                <tr class="text-center">
                                    <td>ID</td>
                                    <td>{{ $product->id }}</td>
                                </tr>
                                <tr class="text-center">
                                    <td>Название</td>
                                    <td>{{ $product->title }}</td>
                                </tr>
                                <tr class="text-center">
                                    <td>Описание</td>
                                    <td>{{ $product->description }}</td>
                                </tr>
                                <tr class="text-center">
                                    <td>Контент</td>
                                    <td>{{ $product->content }}</td>
                                </tr>
                                <tr class="text-center">
                                    <td>Цена</td>
                                    <td>{{ $product->price }}</td>
                                </tr>
                                <tr class="text-center">
                                    <td>Количество</td>
                                    <td>{{ $product->count }}</td>
                                </tr>
                                <tr class="text-center">
                                    <td>Опубликовано</td>
                                    <td>{{ $product->is_published }}</td>
                                </tr>
                                <tr class="text-center">
                                    <td>Категория</td>
                                    <td>{{ $product->category->title }}</td>
                                </tr>
                                <tr class="text-center">
                                    <td>Цвета</td>
                                    <td>
                                        @foreach($product->colors as $color)
                                            <div style="width: 16px; height: 16px; margin: 3px; background-color: {{ $color->color_code }}; display: inline-block;"></div>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <td>Изображение</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $product->preview_image) }}" alt="product-image" class="w-50" >
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <td>Дата создания</td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($product->created_at)->day }}
                                        {{ \Illuminate\Support\Str::ucfirst(\Carbon\Carbon::parse($product->created_at)->translatedFormat('F')) }}
                                        {{ \Carbon\Carbon::parse($product->created_at)->year }}
                                        {{ \Carbon\Carbon::parse($product->created_at)->format('H:i') }}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- ./col -->

            </div>

        </div>
        <!-- /.row -->
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
