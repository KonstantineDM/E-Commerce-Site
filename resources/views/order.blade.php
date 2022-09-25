@extends('master')

@section('title', 'Заказ')

@section('content')
    <div class="starter-template">
        <h1>Подтвердите заказ:</h1>
        <div class="container">
            <div class="row justify-content-center">
                <p>Общая стоимость заказа: <b>71990 руб.</b></p>
                <form action="http://laravel-diplom-1.rdavydov.ru/basket/accept" method="POST">
                    <div>
                        <p>Укажите свои имя и номер телефона, чтобы наш менеджер мог с вами связаться:</p>

                        <div class="container">
                            <div class="form-group">
                                <label for="name" class="control-label col-lg-offset-3 col-lg-2">Имя: </label>
                                <div class="col-lg-4">
                                    <input type="text" name="name" id="name" value="" class="form-control">
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="form-group">
                                <label for="phone" class="control-label col-lg-offset-3 col-lg-2">Номер телефона: </label>
                                <div class="col-lg-4">
                                    <input type="text" name="phone" id="phone" value="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <br>
                        <input type="hidden" name="_token" value="qhk4riitc1MAjlRcro8dvWchDTGkFDQ9Iacyyrkj">					<br>
                        <input type="submit" class="btn btn-success" href="http://laravel-diplom-1.rdavydov.ru/basket/place" value="Подтвердить заказ">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection