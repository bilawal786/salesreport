<?php

namespace App\Exports;

use App\Lead;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Lead::Select('firstname', 'lastname', 'email', 'phone' , 'country' , 'status', 'create_date','modifiy_date'
        	,'call_date' ,'follow_date','source')->get();
    }
}
