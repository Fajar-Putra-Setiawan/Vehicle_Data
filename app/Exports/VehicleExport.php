<?php

namespace App\Exports;

use App\Models\Vehicle;
use Maatwebsite\Excel\Concerns\FromCollection;

class VehicleExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Vehicle::orderBy('created_at', 'asc')
        ->get(['license_plate', 'damage_details', 'car_merk', 'total_price', 'special_notes', 'entry_date']);
    }
}
