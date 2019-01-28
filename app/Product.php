<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    	'name',
    	'description'
    ];

   
    /* Metoda okreslaja relacje pomiedzy cena a produktem (jeden do jeden) */
   
    public function price()
    {

        return $this->hasOne('App\Price');

    }

}
