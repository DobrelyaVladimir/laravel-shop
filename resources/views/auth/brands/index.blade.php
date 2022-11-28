@extends('auth.layouts.master')

@section('title', 'Бренди')
@section('content')
    <div class="col-md-12">
        <h1>Бренди</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    #
                </th>
                <th>
                    Назва
                </th>
                <th>
                    Лого
                </th>
                <th>
                    Дія
                </th>
            </tr>
            @foreach($brands as $brand)
                <tr>
                    <td>{{ $brand->id }}</td>
                    <td>{{ $brand->name }}</td>
                    <td><img height="60px" src="{{\Illuminate\Support\Facades\Storage::url($brand->image_path)}}" alt="{{ $brand->name }} лого"></td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('brands.destroy', $brand) }}" method="POST">
                                <a class="btn btn-warning" type="button" href="{{ route('brands.edit', $brand) }}">Редагувати</a>
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Видалити"></form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a class="btn btn-success" type="button"
           href="{{ route('brands.create') }}">Додати бренд</a>
    </div>
@endsection

