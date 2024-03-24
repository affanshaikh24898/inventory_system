<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','qty','price','user_id'];

    public function lots()
    {
        return $this->hasMany(ProductLot::class);
    }
}
