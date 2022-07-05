@extends('layouts.main')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать категорию</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Категории</a></li>
                        <li class="breadcrumb-item active">Редактирование категории</li>
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
                    <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" value="{{ $user->surname ?? old('surname') }}" class="form-control" name="surname" placeholder="Фамилия">
                                    @error('surname')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" value="{{ $user->name ?? old('name') }}" class="form-control" name="name" placeholder="Имя">
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" value="{{ $user->patronymic ?? old('patronymic') }}" class="form-control" name="patronymic" placeholder="Отчество">
                                    @error('patronymic')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group w-25">
                            <input type="number" value="{{ $user->age ?? old('age') }}" class="form-control" name="age" placeholder="Возраст">
                            @error('age')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="text" value="{{ $user->address ?? old('address') }}" class="form-control" name="address" placeholder="Адресс">
                            @error('address')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <select name="gender" class="custom-select form-control-border" id="exampleSelectBorder">
                                <option disabled selected>Пол</option>
                                <option {{ $user->gender == 1 || old('gender') == 1 ? 'selected' : '' }} value="1">Мужской</option>
                                <option {{ $user->gender == 2 || old('gender') == 2 ? 'selected' : '' }} value="2">Женский</option>
                            </select>
                            @error('gender')
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
