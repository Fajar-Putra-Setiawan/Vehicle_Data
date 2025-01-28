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
        ->get(['license_plate', 'damage_details', 'car_merk', 'total_price', 'special_notes', 'entry_date']);

        $vehicle = $allvehicle->map(function ($item) {
            return [
                'Nomor Plat' => $item->license_plate,
                'Kerusakan' => $item->damage_details, // Ganti 'tanggal' dengan atribut yang sesuai
                'Merk' => $item->car_merk, // Ganti 'attend_p' dengan atribut yang sesuai
                'Harga' => $item->total_price,
                'Note' => $item->special_notes,
                'Tanggal Masuk' => $item->entry_date,
            ];
        });

        return collect([
            ['DATA KENDARAAN'], // Baris kosong untuk pemisah
            ['license_plate', 'damage_details', 'car_merk', 'total_price', 'special_notes', 'entry_date'], // Header untuk data kehadiran
        ])->concat($vehicle);

        // return Vehicle::orderBy('created_at', 'asc')
        // ->get(['license_plate', 'damage_details', 'car_merk', 'total_price', 'special_notes', 'entry_date'])->redirect('https://www.google.com')->with('message', 'Data processed successfully!');;
    }
}
