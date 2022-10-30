@extends('layouts.master')
@section('title', 'Бренд' . $brand->name)
@section('content')
    <div class="starter-template">
        <h1>{{$brand->name}}</h1>
        <div class="row row-cols-sm-2 row-cols-md-3 g-4">
            @foreach($brand->products as $product)
                @include('card', ['$product'=>$product])
            @endforeach
        </div>
    </div>
@endsection
