<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
	protected $fillable = [
        'firstname', 'lastname', 'email', 'phone' , 'country' , 'status', 'call_date' ,'source','create_date','modifiy_date','follow_date'
    ];

    protected $dates = ['create_date','modifiy_date','follow_date'];

    public function comment()
    {
        return $this->hasMany(Comment::class, 'lead_id');
    }
}
