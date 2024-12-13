<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObatController extends Controller
{
     /**
     * Menampilkan data unit dengan pagination.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obats = Obat::with('item')->paginate(10);
        return view('content.Obat.index', compact('obats'));
    }
    /**
     * Menampilkan form untuk membuat obat baru.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Mengambil data items untuk dipilih dalam dropdown
        $items = Item::all();
        return view('content.Obat.create', compact('items'));
    }

    public function store(Request $request)
    {
        // Mulai transaksi database
        DB::beginTransaction();

        try {
            // Validasi data request
            $validatedData = $request->validate([
                'item_id' => 'required|exists:items,item_id',
                'medicine_type' => 'required|string|max:255',
                'dosage' => 'required|string|max:255',
                'expiration_date' => 'required|date|after_or_equal:today',
            ]);

            // Menyimpan data obat
            Obat::create($validatedData);

            // Commit transaksi
            DB::commit();

            // Flash pesan sukses ke session
            session()->flash('success', 'Obat berhasil dibuat.');
        } catch (\Exception $e) {
            // Rollback transaksi jika ada yang gagal
            DB::rollBack();

            // Flash pesan error ke session
            session()->flash('error', 'Gagal membuat obat. Silakan coba lagi.');
        }

        return redirect()->route('obat.index');
    }

}
