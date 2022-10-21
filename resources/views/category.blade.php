@extends('layouts.master')

@section('title', $category->name)

<div class="container">
    <h1>
        {{ $category->name }} {{ $category->products->count() }}
    </h1>
    <p>
        {{ $category->description }}
    </p>
    <div class="row">
        @foreach ($category->products as $product)
            @include('layouts.card', compact('product'))
        @endforeach
    </div>
</div>
</body>
</html>