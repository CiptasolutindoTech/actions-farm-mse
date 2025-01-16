<x-app-layout>
    <div class="container mx-auto mt-6">

        <!-- Breadcrumb -->
        <nav class="mb-4 mx-5" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-2 text-sm text-gray-600 dark:text-gray-400">
                <li>
                    <a href="/dashboard" class="text-blue-600 font-semibold hover:text-blue-700">
                        <i class="fas fa-home mr-1"></i> Beranda
                    </a>
                </li>
                <li>
                    <span class="mx-0">/</span>
                </li>
                <li>
                    <span class="text-gray-600 dark:text-gray-400">Tambah Sales Order</span>
                </li>
            </ol>
        </nav>

        <!-- Form Tambah -->
        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-md shadow-lg mx-5">
            <div class="px-6 py-4">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Form Tambah Sales Order</h2>
                <form action="#" method="POST">
                    @csrf
                    <!-- Form Header -->
                    <div class="grid grid-cols-2 gap-6">
                        <!-- Tanggal SO -->
                        <div>
                            <label for="tanggal_so" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal SO *</label>
                            <input type="date" id="tanggal_so" name="tanggal_so" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                        </div>
                        <!-- Tanggal Pengiriman -->
                        <div>
                            <label for="tanggal_pengiriman" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal Pengiriman *</label>
                            <input type="date" id="tanggal_pengiriman" name="tanggal_pengiriman" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-6 mt-4">
                        <!-- Nama Pelanggan -->
                        <div>
                            <label for="nama_pelanggan" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Pelanggan *</label>
                            <input type="text" id="nama_pelanggan" name="nama_pelanggan" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" value="PT. INDOMARCO PRISMATAMA GUDANG INDUK BOGOR 2" readonly>
                        </div>
                        <!-- Jenis Sales Order -->
                        <div>
                            <label for="jenis_sales_order" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jenis Sales Order *</label>
                            <select id="jenis_sales_order" name="jenis_sales_order" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                                <option value="">-- Pilih --</option>
                                <option value="retail">Retail</option>
                                <option value="wholesale">Wholesale</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-6 mt-4">
                        <!-- Metode Pembayaran -->
                        <div>
                            <label for="metode_pembayaran" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Metode Pembayaran *</label>
                            <select id="metode_pembayaran" name="metode_pembayaran" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                                <option value="">-- Pilih --</option>
                                <option value="cash">Cash</option>
                                <option value="credit">Credit</option>
                            </select>
                        </div>
                        <!-- Keterangan -->
                        <div>
                            <label for="keterangan" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Keterangan</label>
                            <textarea id="keterangan" name="keterangan" rows="2" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
                        </div>
                    </div>

                    <!-- Daftar Barang -->
                    <div class="grid grid-cols-2 gap-6 mb-4">
                    <div>
                        <label for="kategori_barang" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Kategori Barang <span class="text-red-500">*</span>
                        </label>
                        <select id="kategori_barang" class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm text-gray-700 dark:text-gray-300">
                            <option>Select</option>
                        </select>
                    </div>
                    <div>
                        <label for="stok_tersedia" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Stock Tersedia
                        </label>
                        <input type="text" id="stok_tersedia" disabled class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm bg-gray-50 text-gray-700 dark:bg-gray-800 dark:text-gray-300" value="0">
                    </div>
                    <div>
                        <label for="nama_barang" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Nama Barang <span class="text-red-500">*</span>
                        </label>
                        <select id="nama_barang" class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm text-gray-700 dark:text-gray-300">
                            <option>Select</option>
                        </select>
                    </div>
                    <div>
                        <label for="satuan" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Satuan <span class="text-red-500">*</span>
                        </label>
                        <select id="satuan" class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm text-gray-700 dark:text-gray-300">
                            <option>Select</option>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-6 mb-4">
                    <div>
                        <label for="qty" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Quantity <span class="text-red-500">*</span>
                        </label>
                        <input type="number" id="qty" class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm text-gray-700 dark:text-gray-300">
                    </div>
                    <div>
                        <label for="harga_satuan" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Harga Satuan <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="harga_satuan" class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm text-gray-700 dark:text-gray-300">
                    </div>
                    <div>
                        <label for="total_harga" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Total Harga
                        </label>
                        <input type="text" id="total_harga" disabled class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm bg-gray-50 text-gray-700 dark:bg-gray-800 dark:text-gray-300" value="0,00">
                    </div>
                    <div>
                        <label for="discount_barang" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Discount/Barang (%) Satuan <span class="text-red-500">*</span>
                        </label>
                        <input type="number" id="discount_barang" class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm text-gray-700 dark:text-gray-300">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-6 mb-4">
                    <div>
                        <label for="nominal_discount" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Nominal Discount
                        </label>
                        <input type="text" id="nominal_discount" disabled class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm bg-gray-50 text-gray-700 dark:bg-gray-800 dark:text-gray-300" value="0">
                    </div>
                    <div>
                        <label for="total_after_discount" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Total Harga Setelah Discount
                        </label>
                        <input type="text" id="total_after_discount" disabled class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm bg-gray-50 text-gray-700 dark:bg-gray-800 dark:text-gray-300" value="0,00">
                    </div>
                    <div>
                        <label for="ppn" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            PPN %
                        </label>
                        <input type="text" id="ppn" class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm text-gray-700 dark:text-gray-300" value="11">
                    </div>
                    <div>
                        <label for="total_after_ppn" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Total After PPN Item
                        </label>
                        <input type="text" id="total_after_ppn" disabled class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm bg-gray-50 text-gray-700 dark:bg-gray-800 dark:text-gray-300" value="0">
                    </div>
                </div>
                <div class="flex justify-end">
                    <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md text-sm">Tambah</button>
                </div>

                </form>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-md shadow-lg mt-6 mx-5">
            <div class="p-6">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-sm">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th class="px-4 py-2 text-left font-medium text-gray-700 dark:text-gray-300">No.</th>
                            <th class="px-4 py-2 text-left font-medium text-gray-700 dark:text-gray-300">Barang</th>
                            <th class="px-4 py-2 text-left font-medium text-gray-700 dark:text-gray-300">Qty</th>
                            <th class="px-4 py-2 text-left font-medium text-gray-700 dark:text-gray-300">Satuan</th>
                            <th class="px-4 py-2 text-left font-medium text-gray-700 dark:text-gray-300">Harga Satuan</th>
                            <th class="px-4 py-2 text-left font-medium text-gray-700 dark:text-gray-300">Discount/Barang</th>
                            <th class="px-4 py-2 text-left font-medium text-gray-700 dark:text-gray-300">Total Harga</th>
                            <th class="px-4 py-2 text-left font-medium text-gray-700 dark:text-gray-300">PPN</th>
                            <th class="px-4 py-2 text-left font-medium text-gray-700 dark:text-gray-300">Total Setelah PPN</th>
                            <th class="px-4 py-2 text-left font-medium text-gray-700 dark:text-gray-300">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="px-4 py-2 text-center text-gray-500 dark:text-gray-400" colspan="10">Data Kosong</td>
                        </tr>
                    </tbody>
                </table>
                <div class="flex justify-end space-x-2 mt-4">
                    <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md text-sm">Batal</button>
                    <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md text-sm">Simpan</button>
                </div>
            </div>
    </div>
</x-app-layout>
