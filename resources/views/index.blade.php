@extends('layouts.master')

@section('title', 'Главная')

@section('content')
<div class="container">
    <h1>Все товары</h1>

    <div class="row">
        @foreach ($products as $product)
            @include('layouts.card', compact('product'))
        @endforeach
    </div>
@endsection
