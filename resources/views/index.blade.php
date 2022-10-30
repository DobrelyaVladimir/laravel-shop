@extends('layouts.master')
@section('title', 'Головна')
@section('content')
    <div class="starter-template">
        <h1>Усі товари</h1>
        <div class="row row-cols-sm-2 row-cols-md-3 g-4">
            @foreach($products as $product)
               @include('card', ['$product'=>$product])
            @endforeach
        </div>
    </div>
@endsection
