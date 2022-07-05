@extends('layouts.main')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Товары</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Главная</a></li>
                        <li class="breadcrumb-item active">Товары</li>
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
                    <a href="{{ route('product.create') }}" class="btn btn-block btn-primary">Создать</a>
                </div>

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                @if($products->count() > 0)
                                    Всего категорий: <b>{{ $products->total() }} </b> | Показано:
                                    <b>{{ $products->lastItem() }}</b> из <b>{{ $products->total() }}</b>
                                @endif
                            </h3>
                            <div class="card-tools">
                                <form action="#">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="query" class="form-control float-right"
                                               placeholder="Поиск">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr class="text-center">
                                    <th>№</th>
                                    <th>Название</th>
                                    <th>Описание</th>
                                    <th>Контент</th>
                                    <th>Цена</th>
                                    <th>Количество</th>
                                    <th>Опубликовано</th>
                                    <th>Категория</th>
                                    <th>Картинка</th>
                                    <th>Дата создания</th>
                                    <th colspan="3">Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $index => $product)
                                    <tr class="text-center">
                                        <td>{{ $index+1 }}</td>
                                        <td><a href="{{ route('product.show', $product->id) }}">{{ $product->title }}</a></td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->content }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->count }}</td>

                                        <td class="{{ $product->is_published == 1 ? 'text-success' : 'text-danger' }}">
                                            {{ $product->is_published == 1 ? 'Да' : 'Нет' }}
                                        </td>

                                        <td>
                                            <a href="{{ route('category.show', $product->category->id) }}">{{ $product->category->title }}</a>
                                        </td>
                                        <td>
                                            <img src="{{ asset('storage/' . $product->preview_image) }}" alt="product-image"
                                                 style="width: 115px">
                                        </td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($product->created_at)->day }}
                                            {{ \Illuminate\Support\Str::ucfirst(\Carbon\Carbon::parse($product->created_at)->translatedFormat('F')) }}
                                            {{ \Carbon\Carbon::parse($product->created_at)->year }}
                                            {{ \Carbon\Carbon::parse($product->created_at)->format('H:i') }}
                                        </td>
                                        <td>
                                            <a href="{{ route('product.show', $product->id) }}">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a style="color: #ebba34" href="{{ route('product.edit', $product->id) }}">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('product.delete', $product->id) }}"
                                                  method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="border-0 bg-transparent">
                                                    <i class="fas fa-trash-alt text-danger" role="button"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection


