<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $table='features';
    protected $fillable=['name_en','name_sp','image','short_description_en','short_description_sp','rank','status'];
}
