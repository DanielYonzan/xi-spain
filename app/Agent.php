<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $table='agents';
    protected $fillable=['country','city','category','name','image','email','website','skype','whatsapp'];

    public function categorydata()
    {
        return $this->belongsTo('App\Category','category');
    }
}
