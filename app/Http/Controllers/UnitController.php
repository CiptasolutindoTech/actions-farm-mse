<?php

namespace App\Http\Controllers;

use App\DataTables\UnitDataTable;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Menampilkan data unit dalam DataTable.
     *
     * @param \App\DataTables\UnitDataTable $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(UnitDataTable $dataTable)
    {
        return $dataTable->render('content.unit.index');
    }

    /**
     * Menampilkan form untuk membuat unit.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.unit.create');
    }

    /**
     * Menyimpan data unit baru.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:units',
            'name' => 'required',
        ]);

        Unit::create($request->all());

        return redirect()->route('unit.index')->with('success', 'Unit created successfully.');
    }

    /**
     * Menampilkan form untuk mengedit unit.
     *
     * @param \App\Models\Unit $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        return view('content.unit.edit', compact('unit'));
    }

    /**
     * Memperbarui data unit.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Unit $unit
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Unit $unit)
    {
        $request->validate([
            'code' => 'required|unique:units,code,' . $unit->id,
            'name' => 'required',
        ]);

        $unit->update($request->all());

        return redirect()->route('unit.index')->with('success', 'Unit updated successfully.');
    }

    /**
     * Menghapus unit.
     *
     * @param \App\Models\Unit $unit
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Unit $unit)
    {
        $unit->delete();

        return redirect()->route('unit.index')->with('success', 'Unit deleted successfully.');
    }
}
