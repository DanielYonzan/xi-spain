<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $table='checkouts';
    protected $fillable=['event','name','email','price','status'];

    public function eventdata()
    {
        return $this->belongsTo('App\Event','event');
    }
}
