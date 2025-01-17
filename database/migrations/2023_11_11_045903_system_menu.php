<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if(!Schema::hasTable('system_menu')) {
            Schema::create('system_menu', function (Blueprint $table) {
                $table->string('id_menu',10);
                $table->primary('id_menu');
                $table->string('id',100)->nullable();
                $table->enum('type',['folder','file','function'])->nullable();
                $table->string('text',50)->nullable();
                $table->string('parent_id',50)->nullable();
                $table->string('image',50)->nullable();
                $table->string('menu_level',50)->nullable();
                $table->softDeletesTz();
            });
            DB::table('system_menu')->insert([
               [ 'id_menu' => 1,  'id' => 'dashboard',          'type' => 'file','text' => 'Dashboard','parent_id' => "#",'menu_level' => "1",],
               [ 'id_menu' => 10, 'id' => '#',      'type' => 'file', 'text' => 'Barang','parent_id' => "8",'menu_level' => "2",],
               [ 'id_menu' => 82, 'id' => 'unit',               'type' => 'file','text' => 'Satuan','parent_id' => "10",'menu_level' => "2",],
               [ 'id_menu' => 866, 'id' => 'category',               'type' => 'file','text' => 'Kategori','parent_id' => "10",'menu_level' => "2",],
               [ 'id_menu' => 92, 'id' => 'item',                 'type' => 'file', 'text' => 'Item','parent_id' => "10",'menu_level' => "2",],
               [ 'id_menu' => 77, 'id' => 'hewan',               'type' => 'file','text' => 'Hewan','parent_id' => "10",'menu_level' => "2",],
               [ 'id_menu' => 76, 'id' => 'feed',               'type' => 'file','text' => 'Pakan','parent_id' => "10",'menu_level' => "2",],
               [ 'id_menu' => 93, 'id' => 'obat',                 'type' => 'file', 'text' => 'Obat','parent_id' => "10",'menu_level' => "2",],
               [ 'id_menu' => 11, 'id' => 'kandang',                 'type' => 'file', 'text' => 'Kandang','parent_id' => "10",'menu_level' => "2",],
               [ 'id_menu' => 2,  'id' => '#',                  'type' => 'file','text' => 'Persediaan','parent_id' => "#",'menu_level' => "1",],
               [ 'id_menu' => 21, 'id' => 'inventory-stock',    'type' => 'file','text' => 'Stock','parent_id' => "2",'menu_level' => "1",],
               [ 'id_menu' => 3,  'id' => '#',   'type' => 'folder','text' => 'Pembelian','parent_id' => "#",'menu_level' => "1",],
               [ 'id_menu' => 31, 'id' => '#',      'type' => 'file', 'text' => 'Preferensi','parent_id' => "3",'menu_level' => "2",],
               [ 'id_menu' => 97, 'id' => 'Supplier',      'type' => 'file', 'text' => 'Pemasok','parent_id' => "31",'menu_level' => "3",],
               [ 'id_menu' => 32, 'id' => '#',      'type' => 'file', 'text' => 'Order','parent_id' => "3",'menu_level' => "2",],
               [ 'id_menu' => 322, 'id' => 'purchase-order',      'type' => 'file', 'text' => 'Purchase Order','parent_id' => "32",'menu_level' => "3",],
               [ 'id_menu' => 3222, 'id' => 'purchase-order-approval',      'type' => 'file', 'text' => 'Persetujuan Purchase Order','parent_id' => "32",'menu_level' => "3",],
               [ 'id_menu' => 33, 'id' => '#',      'type' => 'file', 'text' => 'Invoice','parent_id' => "3",'menu_level' => "2",],
               [ 'id_menu' => 333, 'id' => '#',      'type' => 'file', 'text' => 'Invoice Pembelian','parent_id' => "33",'menu_level' => "3",],
               [ 'id_menu' => 34, 'id' => '#',      'type' => 'file', 'text' => 'Laporan','parent_id' => "3",'menu_level' => "2",],
               [ 'id_menu' => 344, 'id' => '#',      'type' => 'file', 'text' => 'Laporan Retur Pembelian','parent_id' => "34",'menu_level' => "3",],
               [ 'id_menu' => 35, 'id' => 'purchase-order-return',      'type' => 'file', 'text' => 'Return Pembelian','parent_id' => "3",'menu_level' => "2",],
               [ 'id_menu' => 4,  'id' => 'sales-invoice',      'type' => 'file','text' => 'Penjualan','parent_id' => "#",'menu_level' => "1",],
               [ 'id_menu' => 5,  'id' => '#',                  'type' => 'folder','text' => 'Mutasi','parent_id' => "#",'menu_level' => "1",],
               [ 'id_menu' => 51, 'id' => '#',                  'type' => 'folder','text' => 'Pengeluaran','parent_id' => "5",'menu_level' => "1",],
               [ 'id_menu' => 6,  'id' => '#',                  'type' => 'folder','text' => 'Depresiasi','parent_id' => "#",'menu_level' => "1",],
               [ 'id_menu' => 7,  'id' => '#',                  'type' => 'folder','text' => 'Akutansi','parent_id' => "#",'menu_level' => "1",],
               [ 'id_menu' => 71, 'id' => 'account',            'type' => 'file','text' => 'No. Perkiraan','parent_id' => "7",'menu_level' => "2",],
               [ 'id_menu' => 72, 'id' => 'journal-voucher',    'type' => 'file','text' => 'Jurnal Umum','parent_id' => "7",'menu_level' => "2",],
               [ 'id_menu' => 73, 'id' => 'journal-memorial',   'type' => 'file','text' => 'Jurnal Memorial','parent_id' => "7",'menu_level' => "2",],
               [ 'id_menu' => 74, 'id' => 'balance-sheet',      'type' => 'file','text' => 'Laporan Neraca','parent_id' => "7",'menu_level' => "2",],
               [ 'id_menu' => 75, 'id' => 'profit-loss-report', 'type' => 'file','text' => 'Laporan Laba Rugi','parent_id' => "7",'menu_level' => "2",],
               [ 'id_menu' => 8,  'id' => '#',                  'type' => 'folder','text' => 'Preferensi','parent_id' => "#",'menu_level' => "1",],
               [ 'id_menu' => 81, 'id' => 'preference-company', 'type' => 'file','text' => 'Perusahaan','parent_id' => "8",'menu_level' => "2",],
               [ 'id_menu' => 83, 'id' => 'acct-account-setting','type' => 'file','text' => 'Pengaturan Akun','parent_id' => "8",'menu_level' => "2",],
               [ 'id_menu' => 84, 'id' => 'user','type' => 'file','text' => 'Pengaturan User','parent_id' => "8",'menu_level' => "2",],
               [ 'id_menu' => 844, 'id' => 'menu','type' => 'file','text' => 'Pengaturan Menu','parent_id' => "8",'menu_level' => "2",],
               [ 'id_menu' => 85, 'id' => 'user-group','type' => 'file','text' => 'Pengaturan User Group','parent_id' => "8",'menu_level' => "2",],
               [ 'id_menu' => 86, 'id' => 'asset',               'type' => 'file','text' => 'Asset','parent_id' => "8",'menu_level' => "2",],
               [ 'id_menu' => 87, 'id' => 'bank-account',        'type' => 'file','text' => 'Account Bank','parent_id' => "8",'menu_level' => "2",],
               [ 'id_menu' => 88, 'id' => 'CoreBranch',              'type' => 'file','text' => 'kode cabang','parent_id' => "8",'menu_level' => "2",],
               [ 'id_menu' => 89, 'id' => 'office',               'type' => 'file','text' => 'kode BO','parent_id' => "8",'menu_level' => "2",],
               [ 'id_menu' => 9, 'id' => '#',                     'type' => 'folder', 'text' => 'Laporan','parent_id' => "#",'menu_level' => "1",],
               [ 'id_menu' => 91, 'id' => 'invoice-report',      'type' => 'file', 'text' => 'Laporan Invoice','parent_id' => "8",'menu_level' => "2",],
               [ 'id_menu' => 95, 'id' => 'Warehouse',            'type' => 'file', 'text' => 'Mengelola Gudang','parent_id' => "8",'menu_level' => "2",],
               [ 'id_menu' => 96, 'id' => 'customer',            'type' => 'file', 'text' => 'Pelanggan','parent_id' => "8",'menu_level' => "2",],
               [ 'id_menu' => 94, 'id' => 'WarehouseLocation',      'type' => 'file', 'text' => 'Lokasi Gudang','parent_id' => "8",'menu_level' => "2",],
               [ 'id_menu' => 98, 'id' => 'SalesOrder',      'type' => 'file', 'text' => 'Sales Order','parent_id' => "8",'menu_level' => "2",],
               [ 'id_menu' => 99, 'id' => 'SalesInvoice',      'type' => 'file', 'text' => 'SalesInvoice','parent_id' => "8",'menu_level' => "2",],
               [ 'id_menu' => 911, 'id' => 'invoice-report',      'type' => 'file', 'text' => 'Tagihan Invoice','parent_id' => "91",'menu_level' => "2",],
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('system_menu');
    }
};