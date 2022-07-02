@extends('layouts.main')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Цвета</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Главная</a></li>
                        <li class="breadcrumb-item active">Цвета</li>
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
                    <a href="{{ route('color.create') }}" class="btn btn-block btn-primary">Создать</a>
                </div>

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                @if($colors->count() > 0)
                                    Всего цветов: <b>{{ $colors->total() }} </b> | Показано:
                                    <b>{{ $colors->lastItem() }}</b> из <b>{{ $colors->total() }}</b>
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
                                    <th>Цвет</th>
                                    <th colspan="3">Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($colors as $index => $color)
                                    <tr class="text-center">
                                        <td>{{ $index+1 }}</td>
                                        <td><a href="{{ route('color.show', $color->id) }}">{{ $color->title }}</a></td>
                                        <td>
                                            <div style="width: 16px; height: 16px; background-color: {{ '#' . $color->title }}; display: inline-block;"></div>
                                        </td>
                                        <td>
                                            <a href="{{ route('color.show', $color->id) }}">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a style="color: #ebba34" href="{{ route('color.edit', $color->id) }}">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('color.delete', $color->id) }}"
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


