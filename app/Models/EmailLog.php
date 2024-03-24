<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailLog extends Model
{
    protected $fillable = ['user_id','type', 'sent_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}