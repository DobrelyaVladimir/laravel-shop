<?php

namespace App\Models;

use App\QueryFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['brand_id','name','season','diametr_id','width_id','profile_id','image_path','price','status'];

    public function scopeFilters($query, QueryFilter $filters){
        return $filters->apply($query);
    }
    public function scopeAnalogs($query, $product){
        return $query->where('diametr_id',$product->diametr_id)
            ->where('width_id',$product->width_id)
            ->where('profile_id',$product->profile_id)
            ->where('season',$product->season)
            ->where('id','!=',$product->id)
            ->get();
    }
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
