<?php

namespace App\Http\Controllers;

use App\Models\CoreCity;
use App\Models\CoreProvince;
use Illuminate\Http\Request;
use App\Models\WarehouseLocation;
use Illuminate\Support\Facades\DB;

class WarehouseLocationController extends Controller
{
    /**
     * Menampilkan data warehouse dengan pagination.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warehouses = WarehouseLocation::with(['province', 'city'])->paginate(10); // Mengambil data warehouse dengan relasi province dan city
        return view('content.WarehouseLocation.index', compact('warehouses'));
    }

    /**
     * Menampilkan form untuk membuat warehouse baru.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces = CoreProvince::all();
        $cities = CoreCity::all();
        return view('content.WarehouseLocation.create', compact('provinces', 'cities'));
    }

     /**
     * Menyimpan data warehouse baru.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Start a database transaction
        DB::beginTransaction();

        try {
            // Validate the request data
            $validatedData = $request->validate([
                'warehouse_location_code' => 'required|string|max:20',
                'province_id' => 'required|exists:core_province,province_id',
                'city_id' => 'required|exists:core_city,city_id',
            ]);

            // Create the new warehouse
            WarehouseLocation::create($validatedData);

            // Commit the transaction
            DB::commit();

            // Flash success message to session
            session()->flash('success', 'Warehouse created successfully.');
        } catch (\Exception $e) {
            // Rollback the transaction if something goes wrong
            DB::rollBack();

            // Flash error message to session
            session()->flash('error', 'Failed to create warehouse. Please try again.');
        }

        return redirect()->route('WarehouseLocation.index');
    }

    /**
     * Menampilkan form untuk mengedit unit.
     *
     * @param \App\Models\WarehouseLocation $WarehouseLocation
     * @return \Illuminate\Http\Response
     */
    public function edit(WarehouseLocation $WarehouseLocation)
    {
        $provinces = CoreProvince::all();
        $cities = CoreCity::all();
        return view('content.WarehouseLocation.edit', compact('WarehouseLocation','provinces','cities'));
    }

    public function update(Request $request, WarehouseLocation $WarehouseLocation)
    {
        // Mulai transaksi database
        DB::beginTransaction();

        try {
            // Validasi data request
            $validatedData = $request->validate([
                'warehouse_location_code' => 'required|string|max:20',
                'province_id' => 'required|exists:core_province,province_id',
                'city_id' => 'required|exists:core_city,city_id',
            ]);

            // Update data obat
            $WarehouseLocation->update($validatedData);

            // Commit transaksi
            DB::commit();

            // Flash pesan sukses ke session
            session()->flash('success', 'Warehouse updated successfully.');
        } catch (\Exception $e) {
            // Rollback transaksi jika ada yang gagal
            DB::rollBack();

            // Flash pesan error ke session
            session()->flash('error', 'Failed to update Warehouse. Please try again.');
        }

        return redirect()->route('WarehouseLocation.index');
    }

    public function destroy(WarehouseLocation $WarehouseLocation)
    {
        // Start a database transaction
        DB::beginTransaction();

        try {
            // Delete the unit
            $WarehouseLocation->delete();

            // Commit the transaction
            DB::commit();

            // Flash success message to session
            session()->flash('success', 'WarehouseLocation deleted successfully.');
        } catch (\Exception $e) {
            // Rollback the transaction if something goes wrong
            DB::rollBack();

            // Flash error message to session
            session()->flash('error', 'Failed to delete WarehouseLocation. Please try again.');
        }

        return redirect()->route('WarehouseLocation.index');
    }


}
