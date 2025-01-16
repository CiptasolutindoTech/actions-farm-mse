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
                    <a href="{{ route('SalesInvoice.index') }}" class="text-blue-600 font-semibold hover:text-blue-700">
                        Daftar Invoice Penjualan
                    </a>
                </li>
                <li>
                    <span class="mx-1">/</span>
                </li>
                <li>
                    Daftar Buyers Acknowledgment
                </li>
            </ol>
        </nav>

        <!-- Page Title -->
        <div class="mx-5 mb-4">
            <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Daftar Buyers Acknowledgment</h1>
        </div>

        <!-- Daftar Buyers Acknowledgment -->
        <div id="buyersAcknowledgment">
            <div
                class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-md shadow-lg overflow-hidden mx-5 mt-6">
                <div class="flex justify-between items-center mb-4 px-6 py-4">
                    <h2 class="text-lg font-medium text-gray-800 dark:text-gray-200">Daftar </h2>
                    <!-- Actions -->
                    <div class="flex justify-start">
                        <a href="{{ route('SalesInvoice.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">
                            < Kembali
                        </a>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-300">No
                                </th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-300">
                                    Nama Pelanggan</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-300">No
                                    Penerimaan</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-300">No
                                    SO</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-300">
                                    Tanggal SO</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-300">
                                    Tanggal Delivery SO</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-300">
                                    Nomor PO Customer</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-300">
                                    Tanggal Penerimaan Pihak Pembeli</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-300">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-6 py-4">1</td>
                                <td class="px-6 py-4">Daffa Hanaris</td>
                                <td class="px-6 py-4">Test</td>
                                <td class="px-6 py-4">0002/SO/XII/2024</td>
                                <td class="px-6 py-4">19/12/2024</td>
                                <td class="px-6 py-4">19/12/2024</td>
                                <td class="px-6 py-4">0</td>
                                <td class="px-6 py-4">20/12/2024</td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('SalesInvoice.create') }}"
                                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="px-6 py-4">
                    <div class="flex justify-between">
                        <div>Showing 1 to 1 of 1 entries</div>
                        <div class="flex space-x-2">
                            <button class="px-3 py-1 rounded bg-gray-300 text-gray-700">Previous</button>
                            <button class="px-3 py-1 rounded bg-gray-300 text-gray-700">Next</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
