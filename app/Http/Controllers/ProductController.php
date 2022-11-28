<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Diametr;
use App\Models\Product;
use App\Models\Profile;
use App\Models\Width;
use App\ProductFilters;
use Illuminate\Http\Request;


class ProductController extends Controller{
    public function index(ProductFilters $filters, Request $request){
        $url=$request->fullUrl();
        return view('index', [
            'request'=> $request,
            'products' => Product::filters($filters)->paginate(9)->withPath($url),
            'brands'=>Brand::all(),
            'diameters'=>Diametr::all(),
            'widths'=>Width::all(),
            'profiles'=>Profile::all()]);
    }
    public function show($product){
        $product=Product::find($product);
        $products = Product::analogs($product);

        return view('product',['product'=>$product, 'products'=>$products]);
    }
}
