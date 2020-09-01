<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'authors';
    protected $fillable = [
        'first_name',
        'last_name',
        'title',
        'email'
    ];

    // public function notifications() {
    //     return $this->hasMany('App\Notification');
    // }
}
