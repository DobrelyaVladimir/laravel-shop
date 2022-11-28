<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Diametr;
use App\Models\Product;
use App\Models\Profile;
use App\Models\Width;
use App\ProductFilters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductFilters $filters, Request $request)
    {
        $url=$request->fullUrl();
        return view('auth.products.index',['request'=> $request, 'products'=>Product::filters($filters)->paginate(10)->withPath($url)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.products.form', ['enums'=>config('product'),'brands'=>Brand::all(),'diameters'=>Diametr::all(),'widths'=>Width::all(),'profiles'=>Profile::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $path = $request->file('image_path')->store('images');
        $data = $request->all();
        $data['image_path'] = $path;
        Product::create($data);
        return redirect()->route('products.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $products = Product::analogs($product);
        return view('product',['product'=>$product, 'products'=>$products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('auth.products.form', ['product'=>$product, 'enums'=>config('product'),'brands'=>Brand::all(),'diameters'=>Diametr::all(),'widths'=>Width::all(),'profiles'=>Profile::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        Storage::delete($product->image_path);
        $path = $request->file('image_path')->store('images');
        $data = $request->all();
        $data['image_path'] = $path;
        $product->update($data);
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Storage::delete($product->image_path);
        $product->delete();
        return redirect()->route('products.index');
    }
}
