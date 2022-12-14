<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function  products(){
        return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
    }
    public function getFullPrice(){
        $summ = 0;
        foreach ($this->products as $product){
            $summ += $product->getPriceForCount();
        }
        return $summ;
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
