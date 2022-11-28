<?php

namespace App;


class ProductFilters extends QueryFilter
{
    public function season($season){
        return $this->builder->whereIn('season', $season);
    }
    public function brand($brand){
        return $this->builder->whereIn('brand_id', $brand);
    }
    public function diametr($diametr){
        return $this->builder->whereIn('diametr_id', $diametr);
    }
    public function width($width){
        return $this->builder->whereIn('width_id', $width);
    }
    public function profile($profile){
        return $this->builder->whereIn('profile_id', $profile);
    }
    public function price($order){
        return $this->builder->orderBy('price', $order);
    }
    public function diametrSort($order){
        return $this->builder->orderBy('diametr_id', $order);
    }
    public function brandSort($order){
        return $this->builder->orderBy('brand_id', $order);
    }
    public function  widthSort($order){
        return $this->builder->orderBy('width_id', $order);
    }
    public function  profileSort($order){
        return $this->builder->orderBy('profile_id', $order);
    }
    public function  seasonSort($order){
        return $this->builder->orderBy('season', $order);
    }
}
