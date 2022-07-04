@extends('layouts.main')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать цвета</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Цвета</a></li>
                        <li class="breadcrumb-item active">Редактирование цвета</li>
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
                    <form action="{{ route('color.update', $color->id) }}" method="POST" class="w-25">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label>Выберите цвет</label>
                            <div class="input-group my-colorpicker2 colorpicker-element" data-colorpicker-id="2">
                                <input type="text" name="color_code" class="form-control" data-original-title="" title="" aria-describedby="" value="{{ $color->color_code }}" autocomplete="off">

                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fas fa-square" style="color: {{ $color->color_code }}"></i>
                                    </span>
                                </div>
                            </div>
                            <!-- /.input group -->
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
