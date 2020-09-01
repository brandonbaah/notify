<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    protected $fillable = [
        'name',
        'company',
        'user_id',
        'note'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
