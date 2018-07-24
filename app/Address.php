<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
    	'user_id', 'phone', 'address', 'city', 'province', 'postal_code'
    ];

    //relation
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
