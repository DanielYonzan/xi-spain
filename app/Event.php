<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table='events';
    protected $fillable=['name','image','price','date','short_description_en','short_description_sp','status'];
}
