<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $dates = ['date'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
