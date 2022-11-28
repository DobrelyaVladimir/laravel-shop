@extends('auth.layouts.master')

@section('title', 'Замовлення' . $order->id)
@section('content')
    <div class="py-4">
        <div class="container">
            <div class="justify-content-center">
                <div class="panel">
                    <h1>Замовлення №{{ $order->id }}</h1>
                    <p>Замовник: <b>{{ $order->name }}</b></p>
                    <p>Номер телефона: <b>{{ $order->phone }}</b></p>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Назва</th>
                            <th>Кількість</th>
                            <th>Ціна</th>
                            <th>Вартість</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($order->products as $product)
                            <tr>
                                <td>
                                    <a href="{{ route('product', $product) }}">
                                        <img height="56px"
                                             src="{{ Storage::url($product->image_path) }}">
                                        {{ $product->name }}
                                    </a>
                                </td>
                                <td><span class="badge bg-secondary"> {{ $product->pivot->count }}</span></td>
                                <td>{{ $product->price}} грн</td>
                                <td>{{ $product->getPriceForCount()}} грн</td>

                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3">Загальна вартість:</td>
                            <td>{{ $order->getFullPrice() }} грн</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="btn-group" role="group">
                                    <form class="me-1" action="{{ route('completed', $order) }}" method="POST">
                                        @csrf
                                        <input class="btn btn-success" type="submit" value="Виконано">
                                    </form>
                                    <form action="{{ route('canceled', $order) }}" method="POST">
                                        @csrf
                                        <input class="btn btn-danger" type="submit" value="Скасовано">
                                    </form>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <br>
                </div>
            </div>
        </div>
    </div>
@endsection

