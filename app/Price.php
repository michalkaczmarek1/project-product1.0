<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $fillable = [
    	'price_netto',
    	'price_brutto'
    ];

     /* Metoda okreslaja relacje pomiedzy cena a produktem (jeden do jeden) */

    public function product()
    {

        return $this->belongsTo('App\Product');

    }

}
