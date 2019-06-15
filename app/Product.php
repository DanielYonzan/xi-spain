<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products';
    protected $fillable=['name_en','name_sp','size','unit','price','units_per_case','cases_per_palet','cases_per_palet_layer','palets_per_20_container','self_life','origin','min_order','image','short_description_en','short_description_sp','status','admin_id'];
}
