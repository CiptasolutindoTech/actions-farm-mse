<x-app-layout>
    <div class="container mx-auto mt-6">

        <!-- Breadcrumbs -->
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
                    <span class="text-gray-600 dark:text-gray-400">Daftar Persetujuan Sales Quotation</span>
                </li>
            </ol>
        </nav>

        <!-- Page Title -->
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mx-5">
            Daftar Persetujuan Sales Quotation
            <small class="block text-sm text-gray-500">Mengelola Persetujuan Sales Quotation</small>
        </h1>

        <!-- Table -->
        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-md shadow-lg mt-6 mx-5">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <div>
                        <label for="entries" class="text-sm text-gray-700 dark:text-gray-300">Show</label>
                        <select id="entries" class="border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="25">25</option>
                        </select>
                        <span class="text-sm text-gray-700 dark:text-gray-300">entries</span>
                    </div>
                    <div>
                        <label for="search" class="sr-only">Search</label>
                        <input type="text" id="search" placeholder="Search" class="border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm">
                    </div>
                </div>
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-sm">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left font-medium text-gray-700 dark:text-gray-300">No.</th>
                            <th class="px-4 py-2 text-left font-medium text-gray-700 dark:text-gray-300">Nama Pelanggan</th>
                            <th class="px-4 py-2 text-left font-medium text-gray-700 dark:text-gray-300">No QO</th>
                            <th class="px-4 py-2 text-left font-medium text-gray-700 dark:text-gray-300">Tanggal QO</th>
                            <th class="px-4 py-2 text-left font-medium text-gray-700 dark:text-gray-300">Status</th>
                            <th class="px-4 py-2 text-left font-medium text-gray-700 dark:text-gray-300">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white dark:bg-gray-900 border-b dark:border-gray-700">
                            <td class="px-4 py-2">1.</td>
                            <td class="px-4 py-2">PT. INDOMARCO PRISMATAMA GUDANG INDUK BOGOR 2</td>
                            <td class="px-4 py-2">0002/QO/XII/2024</td>
                            <td class="px-4 py-2">16/12/2024</td>
                            <td class="px-4 py-2">Dalam Proses</td>
                            <td class="px-4 py-2">
                            <a href="{{ route('SalesOrder.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg inline-block transition duration-200 ease-in-out flex items-center">
                                <i class="fas fa-plus mr-2"></i> {{ __('Tambah Sales Order') }}
                            </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="flex justify-between items-center mt-4">
                    <span class="text-sm text-gray-600 dark:text-gray-400">Showing 1 to 2 of 2 entries</span>
                    <div class="flex space-x-1">
                        <button class="bg-blue-500 text-white px-3 py-1 rounded-md text-sm">Previous</button>
                        <button class="bg-blue-500 text-white px-3 py-1 rounded-md text-sm">1</button>
                        <button class="bg-blue-500 text-white px-3 py-1 rounded-md text-sm">Next</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
