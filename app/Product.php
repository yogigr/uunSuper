<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    	'name', 'slug', 'price', 'category_id'
    ];

    public function priceFormatted()
    {
    	return 'Rp ' . number_format($this->price, 0, '', '.');
    }

    //relation
    public function category()
    {
    	return $this->belongsTo('App\Category');
    }
}
