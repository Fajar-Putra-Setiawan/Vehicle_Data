<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\VehicleExport;

class ExportVehicle extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export:vehicle';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export vehicle data to an Excel file';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $filePath = storage_path('app/public/vehicles_test.xlsx');
        Excel::store(new VehicleExport, 'vehicles_test.xlsx', 'public');
        $this->info("Export successful! File saved at: {$filePath}");
    }
}
