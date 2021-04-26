@extends('layouts.layout')

@section('content')
    <div class="container">
        <h2>Добро пожаловать {{ auth()->user()->name }}</h2>
    </div>
@endsection


