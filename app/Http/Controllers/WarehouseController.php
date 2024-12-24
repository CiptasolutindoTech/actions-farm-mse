<?php

namespace App\Http\Controllers;

use App\Models\CoreCity;
use App\Models\CoreProvince;
use App\Models\Warehouse;
use App\Models\WarehouseLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WarehouseController extends Controller
{
    /**
     * Menampilkan data warehouse dengan pagination.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warehouses = Warehouse::with(['WarehouseLocation'])->paginate(10); // Mengambil data warehouse dengan relasi warehouseLocation
        return view('content.Warehouse.index', compact('warehouses'));
    }

    /**
     * Menampilkan form untuk membuat warehouse baru.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $warehouselocation = WarehouseLocation::all(); // Mengambil data lokasi warehouse
        return view('content.Warehouse.create', compact('warehouselocation'));
    }

    /**
     * Menyimpan data warehouse baru.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $validatedData = $request->validate([
                'warehouse_location_id' => 'required|exists:warehouse_location,warehouse_location_id',
                'warehouse_code' => 'required|unique:warehouses',
                'warehouse_name' => 'required',
                'warehouse_address' => 'required',
                'warehouse_type' => 'required',
                'warehouse_phone' => 'required',
                'warehouse_remark' => 'required',
            ]);            

            Warehouse::create($validatedData);

            DB::commit();
            session()->flash('success', 'Warehouse created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Failed to create warehouse. Please try again.');
        }

        return redirect()->route('Warehouse.index');
    }

    /**
     * Menampilkan form untuk mengedit warehouse.
     *
     * @param \App\Models\Warehouse $warehouse
     * @return \Illuminate\Http\Response
     */
    public function edit(Warehouse $Warehouse)
    {
        $warehouselocation = WarehouseLocation::all(); // ambil lokasi warehouse
        return view('content.Warehouse.edit', compact('Warehouse', 'warehouselocation'));
    }
    

    /**
     * Mengupdate data warehouse.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Warehouse $warehouse
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Warehouse $Warehouse)
    {
        DB::beginTransaction();
    
        try {
            $validatedData = $request->validate([
                'warehouse_location_id' => 'required|exists:warehouse_location,warehouse_location_id',
                'warehouse_code' => 'required|unique:warehouses,warehouse_code,' . $Warehouse->warehouse_id . ',warehouse_id',
                'warehouse_name' => 'required',
                'warehouse_address' => 'required',
                'warehouse_type' => 'required',
                'warehouse_phone' => 'required',
                'warehouse_remark' => 'required',
            ]);
    
            $Warehouse->update($validatedData);
    
            DB::commit();
            session()->flash('success', 'Warehouse updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Failed to update warehouse. Please try again.');
        }
    
        return redirect()->route('Warehouse.index');
    }    

    /**
     * Menghapus warehouse.
     *
     * @param \App\Models\Warehouse $warehouse
     * @return \Illuminate\Http\RedirectResponse
     */

    public function destroy(Warehouse $Warehouse)
    {
        // Start a database transaction
        DB::beginTransaction();

        try {
            // Delete the unit
            $Warehouse->delete();

            // Commit the transaction
            DB::commit();

            // Flash success message to session
            session()->flash('success', 'Warehouse deleted successfully.');
        } catch (\Exception $e) {
            // Rollback the transaction if something goes wrong
            DB::rollBack();

            // Flash error message to session
            session()->flash('error', 'Failed to delete Warehouse. Please try again.');
        }

        return redirect()->route('Warehouse.index');
    }
}
