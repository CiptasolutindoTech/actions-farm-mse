<?php

namespace App\Http\Controllers;

use App\Models\SalesInvoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesInvoiceController extends Controller
{
    /**
     * Menampilkan daftar SalesInvoice dengan paginasi.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salesInvoices = SalesInvoice::paginate(10);
        return view('content.SalesInvoice.index', compact('salesInvoices'));
    }

    public function searchBuyersAcknowledgment()
    {
        // Logika untuk mencari atau menampilkan Buyers Acknowledgment
        return view('content.SalesInvoice.search-buyers-acknowledgment');
    }

    /**
     * Menampilkan form untuk membuat SalesInvoice baru.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.SalesInvoice.create');
    }

    /**
     * Menyimpan data SalesInvoice baru.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            // Validasi data
            $request->validate([
                'branch_id' => 'required|integer',
                'warehouse_id' => 'required|integer',
                'customer_id' => 'required|integer',
                'sales_invoice_no' => 'required|string|max:255|unique:sales_invoice',
                'sales_invoice_date' => 'required|date',
                'sales_invoice_due_date' => 'nullable|date|after_or_equal:sales_invoice_date',
                'total_amount' => 'required|numeric|min:0',
            ]);

            // Simpan data
            SalesInvoice::create($request->all());

            DB::commit();
            session()->flash('success', 'Sales Invoice berhasil dibuat.');
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Gagal membuat Sales Invoice. Silakan coba lagi.');
        }

        return redirect()->route('SalesInvoice.index');
    }

    /**
     * Menampilkan form untuk mengedit SalesInvoice.
     *
     * @param \App\Models\SalesInvoice $salesInvoice
     * @return \Illuminate\Http\Response
     */
    public function edit(SalesInvoice $salesInvoice)
    {
        return view('content.SalesInvoice.edit', compact('salesInvoice'));
    }

    /**
     * Memperbarui data SalesInvoice.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SalesInvoice $salesInvoice
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, SalesInvoice $salesInvoice)
    {
        DB::beginTransaction();

        try {
            // Validasi data
            $request->validate([
                'branch_id' => 'required|integer',
                'warehouse_id' => 'required|integer',
                'customer_id' => 'required|integer',
                'sales_invoice_no' => 'required|string|max:255|unique:sales_invoice,sales_invoice_no,' . $salesInvoice->sales_invoice_id . ',sales_invoice_id',
                'sales_invoice_date' => 'required|date',
                'sales_invoice_due_date' => 'nullable|date|after_or_equal:sales_invoice_date',
                'total_amount' => 'required|numeric|min:0',
            ]);

            // Perbarui data
            $salesInvoice->update($request->all());

            DB::commit();
            session()->flash('success', 'Sales Invoice berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Gagal memperbarui Sales Invoice. Silakan coba lagi.');
        }

        return redirect()->route('SalesInvoice.index');
    }

    /**
     * Menghapus SalesInvoice.
     *
     * @param \App\Models\SalesInvoice $salesInvoice
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(SalesInvoice $salesInvoice)
    {
        DB::beginTransaction();

        try {
            $salesInvoice->delete();

            DB::commit();
            session()->flash('success', 'Sales Invoice berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Gagal menghapus Sales Invoice. Silakan coba lagi.');
        }

        return redirect()->route('SalesInvoice.index');
    }
}
