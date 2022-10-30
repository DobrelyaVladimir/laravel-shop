@extends('layouts.master')
@section('title', $product->name)
@section('content')
    <div class="card pt-2">
        <div class="row row-cols-sm-1">
            <div class="col-sm-6 col-md-6">
                <div class="p-4">
                    <img class="img-fluid rounded-start" src="{{asset($product->image_path)}}" alt="{{$product->name}}">
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="card-body">
                    <h2>{{$product->brand->name}} {{$product->name}}</h2>
                    <p class="fw-bold fs-3 text-danger">Ціна: {{$product->price}} грн</p>
                    <form action="{{route('basket-add', $product)}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary">В кошик</button>
                    </form>
                    <p class="fw-bold fs-3 ">Характеристика:</p>
                    <ul class="fs-4 ">
                        <li>Діаметр: R{{$product->diametr->value}}</li>
                        <li>Ширина: {{$product->width->value}}</li>
                        <li>Профіль: {{$product->profile->value}}</li>
                        <li>Сезон: {{$product->season=='winter' ? 'зимові' : 'літні'}}</li>
                    </ul>
                    <p class="{{$product->status ? 'text-success' : 'text-danger'}} fs-3 fw-bold">{{$product->status ? 'Є в наявності' : 'Товар скінчився'}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
