@extends('layouts.master')
@section('title', 'Оформити замовлення')
@section('content')
    <h1>Підтвердіть замовлення</h1>
    <div class="container">
        <div class="row justify-content-center">
            <p>Повна вартість замовлення: <b>{{$order->getFullPrice()}} грн</b></p>
            <form action="{{route('basket-confirm')}}" method="POST">
                @csrf
                <div>
                    <p>Вкажіть своє ім'я та номер телефону, щоб ми могли зв'язатися з вами:</p>
                    <div class="container">
                        <div class="form-group">
                            <label for="name" class="control-label col-lg-offset-3 col-lg-2">Ім'я: </label>
                            <div class="col-lg-4">
                                <input type="text" name="name" id="name" value="" class="form-control">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <label for="phone" class="control-label col-lg-offset-3 col-lg-2">Номер телефону: </label>
                            <div class="col-lg-4">
                                <input type="text" name="phone" id="phone" value="" class="form-control">
                            </div>
                        </div>
                        <br>
                        <br>
                    </div>
                    <br>

                    <input type="submit" class="btn btn-success" value="Підтвердити замовлення">
                </div>
            </form>
        </div>
    </div>
@endsection

