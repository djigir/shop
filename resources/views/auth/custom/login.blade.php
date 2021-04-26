@extends('layouts.layout')

@section('content')

    <div class="custom_auth">
        <div class="container">
            <div class="offset-md-3 col-md-6">
                <form action="" method="POST">
                    @csrf
                    <h2>Вход</h2>
                    <div class="form-group">
                        <input type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" placeholder="E-mail">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="InputPassword1" placeholder="Пароль">
                    </div>
                    <div class="form-group">
                        <a href="{{ route('password-reset') }}" id="forget-password">Забили пароль?</a>
                    </div>
                    <button type="submit" class="btn btn-primary">Войти</button>
                    <p class="registration-offer"><a class="add-to-cart-btn_custom" href="{{ route('register') }}">Регистрация</a></p>
                    <div class="social-section">
                        <ul class="social-network social-circle">
                            <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
