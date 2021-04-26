@extends('layouts.layout')

@section('content')
    <div class="profile-setting-section">
        <div class="container">
            <p class="card-text text-center">В этой вкладке вы можете изменить свое Имя <b>(которое отображаеться на сайте)</b>
                и пароль.</p>
            <div class="offset-md-3 col-md-6">
                @if($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissable">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <strong>{{ $error }}</strong>
                        </div>
                    @endforeach
                @endif
                    @if(session()->has('success'))
                            <div class="alert alert-success alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <strong>{{ session()->get('success') }}</strong>
                        </div>
                    @endif
                <form action="{{ route('edit-login-pass') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="login">Имя (логин)</label>
                        <input type="text" class="form-control" id="login" name="name" aria-describedby="login"
                               placeholder="{{ auth()->user()->name }}">
                    </div>
                    <div class="form-group">
                        <label for="password">Пароль</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
@endsection

