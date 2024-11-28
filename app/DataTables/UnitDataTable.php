<?php
namespace App\DataTables;

use App\Models\Unit;
use Yajra\DataTables\Services\DataTable;

class UnitDataTable extends DataTable
{
    /**
     * Menyusun konfigurasi kolom dan parameters untuk DataTable.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns([
                ['data' => 'id', 'name' => 'id', 'title' => 'ID'],
                ['data' => 'code', 'name' => 'code', 'title' => 'Code'],
                ['data' => 'name', 'name' => 'name', 'title' => 'Name'],
                ['data' => 'created_at', 'name' => 'created_at', 'title' => 'Created At'],
                ['data' => 'updated_at', 'name' => 'updated_at', 'title' => 'Updated At'],
                ['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false]
            ])
            ->parameters([
                'dom' => 'Bfrtip',
                'buttons' => ['csv', 'excel', 'pdf', 'print'],
                'order' => [[0, 'asc']],
                'pageLength' => 10,
            ]);
    }

    /**
     * Menyusun data yang ditampilkan di DataTable.
     *
     * @param \App\Models\Unit $model
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('action', function ($unit) {
                return '<a href="' . route('unit.edit', $unit->id) . '" class="btn btn-sm btn-warning">Edit</a>
                        <form action="' . route('unit.destroy', $unit->id) . '" method="POST" style="display:inline;">
                            ' . method_field('DELETE') . csrf_field() . '
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>';
            });
    }

    /**
     * Menentukan query untuk mendapatkan data unit.
     *
     * @param \App\Models\Unit $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Unit $model)
    {
        return $model->newQuery();
    }
}
