<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    /**
     * Menampilkan data supplier dengan pagination.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::paginate(10);
        return view('content.CoreSupplier.index', compact('suppliers'));
    }

    /**
     * Menampilkan form untuk membuat supplier.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.CoreSupplier.create');
    }

    /**
     * Menyimpan data supplier baru.
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
            $request->validate([
                'supplier_name' => 'required',
                'supplier_code' => 'required|unique:core_supplier',
                'supplier_email' => 'nullable|email',
            ]);

            // Create the new supplier
            Supplier::create($request->all());

            // Commit the transaction
            DB::commit();

            // Flash success message to session
            session()->flash('success', 'Supplier created successfully.');
        } catch (\Exception $e) {
            // Rollback the transaction if something goes wrong
            DB::rollBack();

            // Flash error message to session
            session()->flash('error', 'Failed to create supplier. Please try again.');
        }

        return redirect()->route('Supplier.index');
    }

    /**
     * Menampilkan form untuk mengedit supplier.
     *
     * @param \App\Models\Supplier $Supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $Supplier)
    {
        return view('content.CoreSupplier.edit', compact('Supplier'));
    }

    /**
     * Memperbarui data supplier.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Supplier $Supplier
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Supplier $Supplier)
    {
        // Start a database transaction
        DB::beginTransaction();

        try {
            // Validate the request data
            $request->validate([
                'supplier_name' => 'required',
                'supplier_code' => 'required|unique:core_supplier,supplier_code,' . $Supplier->supplier_id . ',supplier_id',
                'supplier_email' => 'nullable|email',
                'supplier_mobile_phone1' => 'nullable|string|max:15',
            ]);

            // Update the supplier
            $Supplier->update($request->all());

            // Commit the transaction
            DB::commit();

            // Flash success message to session
            session()->flash('success', 'Supplier updated successfully.');
        } catch (\Exception $e) {
            // Rollback the transaction if something goes wrong
            DB::rollBack();
        
            // Log the error for debugging
            \Log::error('Error updating supplier: ' . $e->getMessage());
        
            // Flash error message to session
            session()->flash('error', 'Failed to update supplier. Please try again.');
        }        

        return redirect()->route('Supplier.index');
    }

    /**
     * Menghapus supplier.
     *
     * @param \App\Models\Supplier $Supplier
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Supplier $Supplier)
    {
        // Start a database transaction
        DB::beginTransaction();

        try {
            // Delete the supplier
            $Supplier->delete();

            // Commit the transaction
            DB::commit();

            // Flash success message to session
            session()->flash('success', 'Supplier deleted successfully.');
        } catch (\Exception $e) {
            // Rollback the transaction if something goes wrong
            DB::rollBack();

            // Flash error message to session
            session()->flash('error', 'Failed to delete supplier. Please try again.');
        }

        return redirect()->route('Supplier.index');
    }
}
