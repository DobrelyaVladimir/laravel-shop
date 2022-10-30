<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function diametr(){
        return $this->belongsTo(Diametr::class);
    }
    public function width(){
        return $this->belongsTo(Width::class);
    }
    public function profile(){
        return $this->belongsTo(Profile::class);
    }
    public function getPriceForCount(){
        if (!is_null($this->pivot)){
            return $this->pivot->count*$this->price;
        }
        return $this->price;
    }

}
