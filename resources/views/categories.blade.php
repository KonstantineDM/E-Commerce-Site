@extends('layouts.master')

@section('title', 'Категории товаров')

<div class="container">
    @foreach($categories as $category)
        <div class="panel">
            <a href="{{ route('category', $category->code) }}">
                <img src="https://www.trustedreviews.com/wp-content/uploads/sites/54/2022/03/Samsung-Galaxy-S22-Plus-home-screen-4-scaled.jpg" width="150">
                <h2>{{ $category->name }}</h2>
            </a>
            <p>
                {{ $category->description }}
            </p>
        </div>
    @endforeach
</div>