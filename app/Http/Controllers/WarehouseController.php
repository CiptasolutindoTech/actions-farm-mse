<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;
use App\Models\WarehouseLocation;
use Illuminate\Support\Facades\DB;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the warehouses with pagination.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warehouses = Warehouse::paginate(10);
        return view('content.Warehouse.index', compact('warehouses'));
    }

    /**
     * Show the form for creating a new warehouse.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = WarehouseLocation::all(); // Ambil semua lokasi dari tabel
        return view('content.Warehouse.create', compact('locations'));
    }

    /**
     * Store a newly created warehouse in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $request->validate([
                'warehouse_location_id' => 'required|exists:warehouse_locations,id',
                'warehouse_code' => 'required|unique:warehouses',
                'warehouse_name' => 'required',
                'warehouse_address' => 'required',
            ]);

            Warehouse::create($request->all());

            DB::commit();
            session()->flash('success', 'Warehouse created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Failed to create warehouse. Please try again.');
        }

        return redirect()->route('Warehouse.index');
    }

    /**
     * Show the form for editing the specified warehouse.
     *
     * @param \App\Models\Warehouse $warehouse
     * @return \Illuminate\Http\Response
     */
    public function edit(Warehouse $warehouse)
    {
        return view('content.Warehouse.edit', compact('warehouse'));
    }

    /**
     * Update the specified warehouse in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Warehouse $warehouse
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Warehouse $warehouse)
    {
        DB::beginTransaction();

        try {
            $request->validate([
                'warehouse_location_id' => 'required|exists:warehouse_locations,id',
                'warehouse_code' => 'required|unique:warehouses,warehouse_code,' . $warehouse->warehouse_id . ',warehouse_id',
                'warehouse_name' => 'required',
                'warehouse_address' => 'required',
            ]);

            $warehouse->update($request->all());

            DB::commit();
            session()->flash('success', 'Warehouse updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Failed to update warehouse. Please try again.');
        }

        return redirect()->route('Warehouse.index');
    }

    /**
     * Remove the specified warehouse from storage.
     *
     * @param \App\Models\Warehouse $warehouse
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Warehouse $warehouse)
    {
        DB::beginTransaction();

        try {
            $warehouse->delete();

            DB::commit();
            session()->flash('success', 'Warehouse deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Failed to delete warehouse. Please try again.');
        }

        return redirect()->route('Warehouse.index');
    }
}
