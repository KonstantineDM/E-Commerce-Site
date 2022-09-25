@extends('master')

@section('title', $category->name)

<div class="container">
    <div class="starter-template">
        <h1>
            {{ $category->name }}
        </h1>
        <p>
            {{ $category->description }}
        </p>
        <div class="row">
            @include('card')
        </div>
    </div>
</div>
</body>
</html>