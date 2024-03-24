<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductLot extends Model
{
    protected $fillable = ['product_id','user_id','title','qty','expiration_date'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
