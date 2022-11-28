@extends('layouts.master')
@section('title', 'Головна')
@section('content')
    <div class="starter-template position-relative">
        <h1>Усі товари</h1>
        <div class="row">
            <div class="col-lg-2 col-md-4 col-sm-5">
                <div class="border rounded-1 p-3">
                    <h3>Фільтр</h3>
                    <form action="{{route('index')}}" method="get">
                        <div style="position: absolute;top: 10px;right: 10px">
                            <button class="border-0" name="price" value="{{$request->query('price') =='asc' ? 'desc' : 'asc'}}" type="submit">
                                {{$request->query('price') =='asc' ? 'від дорогих до дешевих' : 'від дешевих до дорогих'}}
                            </button>

                        </div>
                        <div class="form-check text-start">
                            <p class="text-start">Бренди</p>
                            @foreach($brands as $brand)
                                <input name="brand[]" class="form-check-input" type="checkbox"
                                       value="{{$brand->id}}"
                                       {{in_array($brand->id, $request->query('brand') ?? []) ? 'checked' : '' }} id="{{$brand->id}}">
                                <label class="form-check-label" for="{{$brand->id}}">
                                    {{$brand->name}}
                                </label>
                                <br>
                            @endforeach
                        </div>
                        <hr>
                        <div class="form-check text-start">
                            <p class="text-start">Діаметр</p>
                            @foreach($diameters as $diameter)
                                <input name="diametr[]" class="form-check-input" type="checkbox"
                                       value="{{$diameter->id}}"
                                       {{in_array($diameter->id, $request->query('diametr') ?? []) ? 'checked' : '' }} id="{{$diameter->id}}">
                                <label class="form-check-label" for="{{$diameter->id}}">
                                    {{$diameter->value}}
                                </label>
                                <br>
                            @endforeach
                        </div>
                        <hr>
                        <div class="form-check text-start">
                            <p class="text-start">Ширина</p>
                            @foreach($widths as $width)
                                <input name="width[]" class="form-check-input" type="checkbox"
                                       value="{{$width->id}}"
                                       {{in_array($width->id, $request->query('width') ?? []) ? 'checked' : '' }} id="{{$width->id}}">
                                <label class="form-check-label" for="{{$width->id}}">
                                    {{$width->value}}
                                </label>
                                <br>
                            @endforeach
                        </div>
                        <hr>
                        <div class="form-check text-start">
                            <p class="text-start">Профіль</p>
                            @foreach($profiles as $profile)
                                <input name="profile[]" class="form-check-input" type="checkbox"
                                       value="{{$profile->id}}"
                                       {{in_array($profile->id, $request->query('profile') ?? []) ? 'checked' : '' }} id="{{$profile->id}}">
                                <label class="form-check-label" for="{{$profile->id}}">
                                    {{$profile->value}}
                                </label>
                                <br>
                            @endforeach
                        </div>
                        <hr>
                        <div class="form-check text-start">
                            <p class="text-start">Сезон</p>
                            @foreach(config('product.seasons') as $season)
                                <input name="season[]" class="form-check-input" type="checkbox" value="{{$season}}"
                                       {{in_array($season, $request->query('season') ?? []) ? 'checked' : '' }} id="{{$season}}">
                                <label class="form-check-label" for="{{$season}}">
                                    {{$season=='winter'?'Зима':'Літо'}}
                                </label>
                                <br>
                            @endforeach
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Пошук</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-10 col-md-8 col-sm-7">
                <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 g-4">
                    @foreach($products as $product)
                        @include('card', ['$product'=>$product])
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <nav class="product-pagination" aria-label="Page navigation example">
        {{ $products->links()}}
    </nav>

@endsection
