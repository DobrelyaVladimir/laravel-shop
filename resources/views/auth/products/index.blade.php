@extends('auth.layouts.master')

@section('title', 'Товари')

@section('content')
    <div class="col-md-12">
        <h1>Товары</h1>
        <table class="table">
            <tbody class="text-center">

                <tr>
                    <th>
                        #
                    </th>
                    <th>
                        <form action="{{route('products.index')}}" method="get">
                            <button class="border-0 bg-white fw-bold p-0" name="brandSort"
                                    value="{{$request->query('brandSort') =='asc' ? 'desc' : 'asc'}}" type="submit">
                                Бренд
                            </button>
                        </form>
                    </th>
                    <th>
                        Назва
                    </th>
                    <th>
                        <form action="{{route('products.index')}}" method="get">
                            <button class="border-0 bg-white fw-bold p-0" name="diametrSort"
                                    value="{{$request->query('diametrSort') =='asc' ? 'desc' : 'asc'}}" type="submit">
                                Діаметр
                            </button>
                        </form>
                    </th>
                    <th>
                        <form action="{{route('products.index')}}" method="get">
                            <button class="border-0 bg-white fw-bold p-0" name="widthSort"
                                    value="{{$request->query('widthSort') =='asc' ? 'desc' : 'asc'}}" type="submit">
                                Ширина
                            </button>
                        </form>
                    </th>
                    <th>
                        <form action="{{route('products.index')}}" method="get">
                            <button class="border-0 bg-white fw-bold p-0" name="profileSort"
                                    value="{{$request->query('profileSort') =='asc' ? 'desc' : 'asc'}}" type="submit">
                                Профіль
                            </button>
                        </form>
                    </th>
                    <th>
                        <form action="{{route('products.index')}}" method="get">
                            <button class="border-0 bg-white fw-bold p-0" name="seasonSort"
                                    value="{{$request->query('seasonSort') =='asc' ? 'desc' : 'asc'}}" type="submit">
                                Сезон
                            </button>
                        </form>
                    </th>
                    <th>
                        Фото
                    </th>
                    <th>
                        <form action="{{route('products.index')}}" method="get">
                        <button class="border-0 bg-white fw-bold p-0" name="price"
                                value="{{$request->query('price') =='asc' ? 'desc' : 'asc'}}" type="submit">
                            Ціна
                        </button>
                        </form>
                    </th>
                    <th class="text-center">
                        Дія
                    </th>
                </tr>

            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id}}</td>
                    <td>{{ $product->brand->name}}</td>
                    <td>{{ $product->name }}</td>
                    <td>R{{ $product->diametr->value }}</td>
                    <td>{{ $product->width->value }}</td>
                    <td>{{ $product->profile->value }}</td>
                    <td>{{ $product->season}}</td>
                    <td><img height="56px" src="{{\Illuminate\Support\Facades\Storage::url($product->image_path)}}"
                             alt="{{ $product->name}}"></td>
                    <td>{{ $product->price}} грн</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('products.destroy', $product) }}" method="POST">
                                <a class="btn btn-success" type="button"
                                   href="{{ route('products.show', $product) }}">Відкрити</a>
                                <a class="btn btn-warning" type="button"
                                   href="{{ route('products.edit', $product) }}">Редагувати</a>
                                @csrf
                                @method('DELETE')
{{--                                <input class="btn btn-danger" type="submit" value="Видалити">--}}
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a class="btn btn-success" type="button" href="{{ route('products.create') }}">Додати товар</a>
    </div>
    <nav class="product-pagination" aria-label="Page navigation example">
        {{ $products->links() }}
    </nav>
@endsection
