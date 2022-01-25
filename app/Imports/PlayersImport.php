<?php

namespace App\Imports;

use App\Models\Player;
use Maatwebsite\Excel\Concerns\ToModel;

class PlayersImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Player([
            'pname'     => $row[0],      // first row should be the name
            'phone_num'    => $row[1],  // second row should be phone number
            // 'location'    => $row[2],  // third row should be location
        ]);
    }
}
