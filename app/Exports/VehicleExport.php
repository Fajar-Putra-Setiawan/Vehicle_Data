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
        $allvehicle = Vehicle::orderBy('created_at', 'asc')
        ->get(['license_plate','damage_details','car_merk','total_price','special_notes','entry_date']);

        $vehicleData = $allvehicle->map(function ($item){
            return[
                'license_plate' => $item->license_plate,
                'damage_details' => $item->damage_details,
                'car_merk' => $item->car_merk,
                'total_price' => $item->total_price,
                'special_notes' => $item->special_notes,
                'entry_date' => $item->entry_date,
            ];
        });
        return collect([
            ['DATA VEHICLE'], // Baris kosong untuk pemisah
            ['license_plate','damage_details','car_merk','total_price','special_notes','entry_date'], // Header untuk data kehadiran
        ])->concat($vehicleData);
    }
}
