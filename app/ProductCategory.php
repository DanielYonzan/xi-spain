<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table = 'product_categorys';
    protected $fillable = ['product','category'];

    public function productItems(){
        return $this->hasMany('App/Product');
    }
}
