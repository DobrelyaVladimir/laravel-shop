@extends('auth.layouts.master')

@section('title', 'Замовлення')
@section('content')
    <div class="col-md-12">
        <h1>Замовлення</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    #
                </th>
                <th>
                    Им'я
                </th>
                <th>
                    Телефон
                </th>
                <th>
                    Коли відправили
                </th>
                <th>
                    Сума
                </th>
                <th>
                    Дія
                </th>
            </tr>
            @foreach($orders as $order)
                <tr class="{{$order->status==1 ? 'table-warning' : 'table-success'}}">
                    <td>{{$order->id}}</td>
                    <td>{{$order->name}}</td>
                    <td>{{$order->phone}}</td>
                    <td>{{$order->updated_at->format('H:i d/m/Y')}}</td>
                    <td>{{$order->getFullPrice()}} грн</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{route('orders.show', $order)}}" class="btn btn-success" type="button">Відкрити</a>
                        </div>
                        @if($order->status==2)
                            <img height="20px" src="{{\Illuminate\Support\Facades\Storage::url('/images/ok.svg')}}" alt="">
                            <span class="text-success fw-bold">Виконаний</span>
                        @elseif($order->status==3)
                            <span class="text-danger fw-bold">Скасований</span>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
