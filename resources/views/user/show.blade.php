@extends('layouts.main')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Пользователь: {{ $user->title }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Пользователи</a></li>
                        <li class="breadcrumb-item active">{{ $user->name }}</li>
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
                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-block btn-warning">Редактировать</a>
                </div>

                <div class="col-2 mb-4">
                    <form action="{{ route('user.delete', $user->id) }}" method="POST">
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
                                    <td>{{ $user->id }}</td>
                                </tr>
                                <tr class="text-center">
                                    <td>Имя</td>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr class="text-center">
                                    <td>Отчество</td>
                                    <td>{{ $user->surname }}</td>
                                </tr>
                                <tr class="text-center">
                                    <td>Фамилия</td>
                                    <td>{{ $user->surname }}</td>
                                </tr>
                                <tr class="text-center">
                                    <td>Email</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr class="text-center">
                                    <td>Возраст</td>
                                    <td>{{ $user->age }}</td>
                                </tr>
                                <tr class="text-center">
                                    <td>Пол</td>
                                    <td>{{ $user->genderTitle }}</td>
                                </tr>
                                <tr class="text-center">
                                    <td>Дата создания</td>
                                    <td>{{ $user->created_at }}</td>
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
