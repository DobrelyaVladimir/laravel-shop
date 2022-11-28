@extends('auth.layouts.master')

@isset($product)
    @section('title', 'Редагувати товар ' . $product->name)
@else
    @section('title', 'Додати товар')
@endisset

@section('content')
    <div class="col-md-12">
        @isset($product)
            <h1>Редагувати товар <b>{{ $product->name }}</b></h1>
        @else
            <h1>Додати товар</h1>
        @endisset
        <form method="POST" enctype="multipart/form-data"
              @isset($product)
              action="{{ route('products.update', $product) }}"
              @else
              action="{{ route('products.store') }}"
            @endisset
        >
            <div>
                @isset($product)
                    @method('PUT')
                @endisset
                @csrf
                <div class="input-group row">
                    <label for="brand_id" class="col-sm-2 col-form-label">Бренд: </label>
                    <div class="col-sm-6">
                        @error('brand_id')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <select name="brand_id" id="brand_id" class="form-control">
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}"
                                        @isset($product)
                                        @if($product->brand_id == $brand->id)
                                        selected
                                    @endif
                                    @endisset
                                >{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Назва: </label>
                    <div class="col-sm-6">
                        @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <input type="text" class="form-control" name="name" id="name"
                               value="@isset($product){{ $product->name }}@endisset">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="diametr_id" class="col-sm-2 col-form-label">Діаметр: </label>
                    <div class="col-sm-6">
                        @error('diametr_id')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <select name="diametr_id" id="diametr_id" class="form-control">
                            @foreach($diameters as $diametr)
                                <option value="{{ $diametr->id }}"
                                        @isset($product)
                                        @if($product->diametr_id == $diametr->id)
                                        selected
                                    @endif
                                    @endisset
                                >{{ $diametr->value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="width_id" class="col-sm-2 col-form-label">Ширина: </label>
                    <div class="col-sm-6">
                        @error('width_id')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <select name="width_id" id="width_id" class="form-control">
                            @foreach($widths as $width)
                                <option value="{{ $width->id }}"
                                        @isset($product)
                                        @if($product->width_id == $width->id)
                                        selected
                                    @endif
                                    @endisset
                                >{{ $width->value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                    <div class="input-group row">
                        <label for="profile_id" class="col-sm-2 col-form-label">Профіль: </label>
                        <div class="col-sm-6">
                            @error('profile_id')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <select name="profile_id" id="profile_id" class="form-control">
                                @foreach($profiles as $profile)
                                    <option value="{{ $profile->id }}"
                                            @isset($product)
                                            @if($product->profile_id == $profile->id)
                                            selected
                                        @endif
                                        @endisset
                                    >{{ $profile->value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="input-group row">
                        <label for="season" class="col-sm-2 col-form-label">Сезон: </label>
                        <div class="col-sm-6">
                            @error('season')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <select name="season" id="season" class="form-control">
                                @foreach($enums['seasons'] as $season)
                                    <option value="{{ $season }}"
                                            @isset($product)
                                            @if($product->season == $season)
                                            selected
                                        @endif
                                        @endisset
                                    >{{ $season }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                <div class="input-group row">
                    <label for="image_path" class="col-sm-2 col-form-label">Фото: </label>
                    <div class="col-sm-10">
                        @error('image_path')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <label class="btn btn-default btn-file">
                            Завантажити <input type="file" style="display: none;" value="@isset($product){{ $product->image_path }}@endisset" name="image_path" id="image_path">
                        </label>
                    </div>
                </div>
                <br>
                    <div class="input-group row">
                        <label for="price" class="col-sm-2 col-form-label">Ціна: </label>
                        <div class="col-sm-6">
                            @error('price')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <input type="text" class="form-control" name="price" id="price"
                                   value="@isset($product){{ $product->price }}@endisset">
                        </div>
                    </div>
                    <br>
                    <div class="input-group row">
                        <label for="status" class="col-sm-2 col-form-label">Наявність: </label>
                        <div class="col-sm-6">
                            @error('status')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <select name="status" id="status" class="form-control">
                                @foreach($enums['status'] as $status)
                                    <option value="{{ $status }}"
                                            @isset($product)
                                            @if($product->status == $status)
                                            selected
                                        @endif
                                        @endisset
                                    >{{ $status }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                <button type="submit" class="btn btn-success">Зберігти</button>
            </div>
        </form>
    </div>
@endsection
