@extends('auth.layouts.master')
@isset($brand)
    @section('title', 'Редагувати бренд' . $brand->name)
@else
    @section('title', 'Додати бренд')
@endisset

@section('content')
    <div class="col-md-12">
        @isset($brand)
            <h1>Редагувати бренд <b>{{ $brand->name }}</b></h1>
        @else
            <h1>Додати бренд</h1>
        @endisset
               <form method="POST" enctype="multipart/form-data"
                   @isset($brand)
                       action="{{ route('brands.update', $brand) }}"
                   @else
                       action="{{ route('brands.store') }}"
                   @endisset
               >
            <div>
                @isset($brand)
                    @method('PUT')
                @endisset
                @csrf
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Назва бренду </label>
                    <div class="col-sm-6">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" class="form-control" name="name" id="name"
                               value="{{ old('name', isset($brand) ? $brand->name : null) }}">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="image_path" class="col-sm-2 col-form-label">Логотип: </label>
                    <div class="col-sm-10">
                        @error('image_path')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label class="btn btn-default btn-file">
                            Завантажити <input type="file" style="display: none;" name="image_path" id="image_path">
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Зберігти</button>
            </div>
        </form>
    </div>
@endsection
