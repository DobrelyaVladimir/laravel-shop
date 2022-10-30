@extends('layouts.master')
@section('title', 'Бренди')
@section('content')
    <div class="starter-template">
        <h1>Бренди</h1>
        <div class="row row-cols-sm-2 row-cols-md-3 g-4">
            @foreach($brands as $brand)
                <div class="card">
                    <div class="thumbnail">
                        <a href="{{route('brand', $brand->id)}}"><img style="display:block;width: 100%" src="{{asset($brand->image_path)}}" alt="{{$brand->name}}"></a>
                        <div class="caption">
                            <a href="{{route('brand', $brand->id)}}"><h3>{{$brand->name}}</h3></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
