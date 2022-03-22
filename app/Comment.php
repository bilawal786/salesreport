<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function lead()
    {
        return $this->belongsTo('App\Lead', 'lead_id')->select(['id']);
    }
}
