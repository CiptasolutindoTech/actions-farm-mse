<x-app-layout>
    <div class="container mx-auto mt-6">
        <!-- Breadcrumb -->
        <nav class="mb-4 mx-5" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-2 text-sm text-gray-600 dark:text-gray-400">
                <li>
                    <a href="/" class="text-blue-600 font-semibold hover:text-blue-700">
                        <i class="fas fa-home mr-1"></i> Beranda
                    </a>
                </li>
                <li>
                    <span class="mx-0">/</span>
                </li>
                <li>
                    <span class="text-gray-600 dark:text-gray-400">Daftar Invoice Penjualan</span>
                </li>
            </ol>
        </nav>

        <!-- Page Title -->
        <div class="mx-5 mb-4">
            <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Daftar Invoice Penjualan</h1>
            <p class="text-gray-600 dark:text-gray-400">Mengelola Invoice Penjualan</p>
        </div>

        <!-- Filter Section -->
        <div class="bg-gray-100 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-md shadow-md mx-5 p-4">
            <form method="GET" action="">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label for="tanggal_mulai" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal Mulai *</label>
                        <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-input mt-1 block w-full rounded-md shadow-sm">
                    </div>
                    <div>
                        <label for="tanggal_akhir" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal Akhir *</label>
                        <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-input mt-1 block w-full rounded-md shadow-sm">
                    </div>
                    <div>
                        <label for="kode_pembeli" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kode Pembeli</label>
                        <select name="kode_pembeli" id="kode_pembeli" class="form-select mt-1 block w-full rounded-md shadow-sm">
                            <option value="">Select</option>
                            <option value="PT.INDOMARCO PRISMATAMA">PT.INDOMARCO PRISMATAMA</option>
                            <option value="PT.SUMBER ALFARIA TRJAYA">PT.SUMBER ALFARIA TRJAYA</option>
                            <option value="PT.INTI CAKRAWALA CITRA">PT.INTI CAKRAWALA CITRA</option>
                            <option value="PT.MIDI UTAMA INDONESIA">PT.MIDI UTAMA INDONESIA</option>
                            <option value="PT.SUMBER HIDUP SEHAT">PT.SUMBER HIDUP SEHAT</option>
                            <option value="PT.TOSERBA YOGYA/GRIYA">PT.TOSERBA YOGYA/GRIYA</option>
                            <option value="PT.INTI CAKRAWALA MAJU">PT.INTI CAKRAWALA MAJU</option>
                            <option value="PT.PERINTIS PELAYANAN PARIPURNA">PT.PERINTIS PELAYANAN PARIPURNA</option>
                            <option value="PT.CENTURY FRANCHISINDO UTAMA">PT.CENTURY FRANCHISINDO UTAMA</option>
                            <option value="PT.Hero Supermarket, Tbk">PT.Hero Supermarket, Tbk</option>
                            <option value="APT">APT</option>
                            <option value="PT.PANEN SELARAS ADIPERKASA">PT.PANEN SELARAS ADIPERKASA</option>
                            <option value="PT.TEKNOLOGI MEDIKA PRATAMA ">PT.TEKNOLOGI MEDIKA PRATAMA </option>
                            <option value="WAREHOUSE WATSONS">WAREHOUSE WATSONS</option>
                            <option value="PT.GOGOBLI ASIA TEKNOLOGI">PT.GOGOBLI ASIA TEKNOLOGI</option>
                            <option value="TO">TO</option>
                            <option value="TIRTA HUSADA FARMA">TIRTA HUSADA FARMA</option>
                            <option value="ICM SEMARANG">ICM SEMARANG</option>
                            <option value="daffa hanaris">daffa hanaris</option>
                        </select>
                    </div>
                </div>
                <div class="flex justify-end space-x-2 mt-4">
                    <button type="reset" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg">
                        <i class="fas fa-times mr-1"></i>Batal
                    </button>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
                        <i class="fas fa-search mr-1"></i>Cari
                    </button>
                    <a href="#" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg">
                        <i class="fas fa-file-export mr-1"></i>Export
                    </a>
                </div>
            </form>
        </div>

        <!-- Table Section -->
        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-md shadow-lg overflow-hidden mx-5 mt-6">
            <div class="flex justify-between items-center mb-4 px-6 py-4">
                <h2 class="text-lg font-medium text-gray-800 dark:text-gray-200">Daftar </h2>
                <a href="{{ route('SalesInvoice.search-buyers-acknowledgment') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center">
                    <i class="fas fa-plus mr-2"></i> Tambah Invoice Penjualan Baru
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto">
                    <thead class="bg-gray-100 dark:bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-300">No.</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-300">Nama Pembeli</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-300">No Invoice Penjualan</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-300">Tanggal Invoice</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-300">No Faktur Pajak</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-300">No Penerimaan Pembeli</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-300">No TTF</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-300">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Jika data kosong -->
                        <tr>
                            <td colspan="8" class="px-6 py-4 text-center text-gray-500">No data available in table</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4">
                <!-- Pagination -->
                <div class="flex justify-between">
                    <div>Showing 0 to 0 of 0 entries</div>
                    <div class="flex space-x-2">
                        <button class="px-3 py-1 rounded bg-gray-300 text-gray-700">Previous</button>
                        <button class="px-3 py-1 rounded bg-gray-300 text-gray-700">Next</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
