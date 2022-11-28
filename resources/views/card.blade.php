<div class="col">
    <div class="card h-100 p-1" >
<div class="overflow-hidden">
    <a href="{{route('product', $product)}}"><img class="card-img m-auto" style="display:block;max-height:250px;width: max-content"
             src="{{asset(\Illuminate\Support\Facades\Storage::url($product->image_path))}}"
             alt="{{$product->name}}"></a>
</div>
        <div class="card-body">
            <h4>{{$product->brand->name}} {{$product->name}}</h4>
            <p class="fw-bold fs-5 text-success">Ціна: {{$product->price}} грн</p>
            <p>
            <form action="{{route('basket-add', $product->id)}}" method="post">
                @csrf
                <button type="submit" class="btn btn-primary">В кошик</button>
                <a href="{{route('product', $product)}}" class="btn btn-secondary" role="button">Подробиці</a>
            </form>

            </p>
            <div class="hidden-menu">
                <p>Характеристика:</p>
                <ul>
                    <li>Діаметр: R{{$product->diametr->value}}</li>
                    <li>Ширина: {{$product->width->value}}</li>
                    <li>Профіль: {{$product->profile->value}}</li>
                    <li>Сезон: {{$product->season=='winter' ? 'зимові' : 'літні'}}</li>
                </ul>
                <p class="{{$product->status ? 'text-success' : 'text-danger'}}">{{$product->status ? 'Є в наявності' : 'Товар скінчився'}}</p>
            </div>
        </div>
    </div>
</div>

