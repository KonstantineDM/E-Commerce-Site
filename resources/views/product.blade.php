@extends('layouts.master')

@section('title', 'Товар')

<div class="container">
    <h1>{{ $product }}</h1>
    <p>Цена: <b>71990 руб.</b></p>
    <img src="https://avatars.mds.yandex.net/get-altay/5459048/2a0000017de96a59bc706d99da1e37a39e03/XXL" width="300">
    <p>Отличный продвинутый телефон с памятью на 64 gb</p>
    <a class="btn btn-success" href="http://laravel-diplom-1.rdavydov.ru/basket/1/add">Добавить в корзину</a>
</div>
</body>
</html>