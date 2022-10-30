@extends('layouts.master')
@section('title', 'Кошик')
@section('content')
    <h1></h1>
    <p></p>
    <div class="panel">
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
           @if(!is_null($order))
               @foreach($order->products as $product)
                   <tr>
                       <td>
                           <a href="{{route('product', ['product'=>$product])}}">
                               <img height="56px" src="{{$product->image_path}}">{{$product->brand->name}} {{$product->name}}
                           </a>
                       </td>
                       <td><span class="badge rounded-pill bg-dark">{{$product->pivot->count}}</span>
                           <div class="btn-group form-inline">
                               <form action="{{route('basket-remove', $product)}}" method="POST">
                                   <button type="submit" class="btn btn-sm btn-danger"><span>-</span></button>
                                   @csrf
                               </form>
                               <form action="{{route('basket-add', $product)}}" method="POST">
                                   <button type="submit" class="btn btn-sm btn-success">
                                       <span>+</span></button>
                                   @csrf
                               </form>
                           </div>
                       </td>
                       <td>{{$product->price}} грн.</td>
                       <td>{{$product->getPriceForCount()}} грн.</td>
                   </tr>
               @endforeach
           @endif

            <tr>
                <td colspan="3">Загальна вартість</td>
                <td>{{$order ? $order->getFullPrice() : '0'}} грн</td>
            </tr>
            </tbody>
        </table>
        <br>
        <div class="row">
            <br>
            <div class="btn-group pull-right" role="group">
                <a type="button" class="btn btn-success"
                   href="{{route('basket-place')}}">Оформити замовлення</a>
            </div>
        </div>
@endsection

