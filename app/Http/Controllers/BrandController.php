<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    public function index(){
        return view('brands',['brands' => Brand::all()]);
    }
    public function brand($brand){
        $brandProducts= Brand::where('id', $brand)->first();
        return view('brand',['brand' => $brandProducts]);
    }
}
