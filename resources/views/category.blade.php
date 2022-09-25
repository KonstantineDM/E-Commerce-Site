@extends('master')

@section('title', $category->name)

<div class="container">
    <div class="starter-template">
        <h1>
            {{ $category->name }} {{ $category->products->count() }}
        </h1>
        <p>
            {{ $category->description }}
        </p>
        <div class="row">
            @foreach ($category->products as $product)
                @include('card', compact('product'))
            @endforeach
        </div>
    </div>
</div>
</body>
</html>