<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='categorys';
    protected $fillable=['name_en','name_sp','image','rank','status'];
}
