<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Exports\VehicleExport;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class VehiclesAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicles = Vehicle::paginate(10);

        return view('vehiclesAdmin.index', compact('vehicles'));
    }

    public function search(Request $request){
        $search = $request->search;

        $vehicles = Vehicle::where(function($query) use ($search) {
            $query->where('license_plate','like',"%$search");
        })->paginate(10);
        // Menyimpan query pencarian ke URL
        $vehicles->appends(['search' => $search]);

        return view('vehiclesAdmin.index', compact('vehicles', 'search'));
    }

    public function export()
    {
        return Excel::download(new VehicleExport, 'vehicles_admin.xlsx');
        // Melakukan redirect setelah ekspor
        return redirect()->route('vehiclesAdmin.index')->with('success', 'Data kendaraan berhasil diekspor!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vehiclesAdmin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'license_plate' => 'required',
            'damage_details' => 'required',
            'car_merk' => 'required',
            'entry_date' => 'required|date',
            'total_price' => 'required',
            'vehicle_photo' => 'nullable|image|mimes:jpeg,jpg,png',
            'special_notes' => 'nullable',
        ]);
        $image = $request->file('vehicle_photo');
        // Tambahkan pengecekan apakah file diunggah
        if ($image) {
            $image->storeAs('public/vehicle', $image->hashName());

            Vehicle::create([
                'license_plate' => $request->license_plate,
                'entry_date' => $request->entry_date,
                'car_merk' => $request->car_merk,
                'total_price' => $request->total_price,
                'damage_details' => $request->damage_details,
                'vehicle_photo' => $image->hashName(),
                'special_notes' => $request->special_notes,
            ]);

            return redirect()->route('vehiclesAdmin.index')->with('success', 'Vehicle added successfully.');
        } else {
            // Tambahkan penanganan jika file tidak diunggah
            Vehicle::create([
                'license_plate'     => $request->license_plate,
                'damage_details'   => $request->damage_details,
                'car_merk' => $request->car_merk,
                'entry_date' => $request->entry_date,
                'total_price'   => $request->total_price,
                'special_notes'   => $request->special_notes,
            ]);

            return redirect()->route('vehiclesAdmin.index')->with('success', 'Vehicle added successfully.');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vehicle = Vehicle::findOrFail($id);

        //delete post
        $vehicle->delete();

        //redirect to index
        return redirect()->route('vehiclesAdmin.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}
