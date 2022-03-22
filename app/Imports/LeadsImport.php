<?php

namespace App\Imports;

use App\Lead;
use Maatwebsite\Excel\Concerns\ToModel;

class LeadsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Lead([
            'firstname'     => $row[0],
            'lastname'    => $row[1],
            'email'    => $row[2],
            'phone'    => $row[3],
            'country'    => $row[4],
            'status'    => $row[5],
            'create_date'    => $row[6],
            'modifiy_date'    => $row[7],
            'call_date'    => $row[8],
            'follow_date'    => $row[9],
            'source'    => $row[10],
        ]);
    }
}
