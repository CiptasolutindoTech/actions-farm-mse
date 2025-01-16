<x-app-layout>
    <div class="container mx-auto mt-6">

        <!-- Flash Message Notification -->
        @if (session('success'))
            <div class="fixed top-2 left-1/2 transform -translate-x-1/2 z-50 bg-green-500 text-white py-3 px-6 rounded-md shadow-md flex items-center space-x-2 mb-4 transition-transform duration-300" id="success-message">
                <i class="fas fa-check-circle"></i>
                <span>{{ session('success') }}</span>
            </div>
        @elseif (session('error'))
            <div class="fixed top-2 left-1/2 transform -translate-x-1/2 z-50 bg-red-500 text-white py-3 px-6 rounded-md shadow-md flex items-center space-x-2 mb-4 transition-transform duration-300" id="error-message">
                <i class="fas fa-exclamation-circle"></i>
                <span>{{ session('error') }}</span>
            </div>
        @endif

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
                    <span class="text-gray-600 dark:text-gray-400">Daftar Sales Order</span>
                </li>
            </ol>
        </nav>

        <!-- Filter Section -->
        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-md shadow-lg mx-5">
            <div class="px-6 py-4">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Filter</h2>
                <form action="#" method="GET" class="flex items-center space-x-4">
                    <!-- Tanggal Mulai -->
                    <div>
                        <label for="start_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal Mulai</label>
                        <input type="date" name="start_date" id="start_date" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <!-- Tanggal Akhir -->
                    <div>
                        <label for="end_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal Akhir</label>
                        <input type="date" name="end_date" id="end_date" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <!-- Buttons -->
                    <div class="flex items-center space-x-2 mt-6">
                        <button type="reset" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md shadow transition duration-200">Batal</button>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md shadow transition duration-200">Cari</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Table Section -->
        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-md shadow-lg mx-5 mt-6">
            <div class="px-6 py-4">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Daftar</h2>
                    <a href="{{ route('SalesOrder.sales_quotation') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg inline-block transition duration-200 ease-in-out flex items-center">
                    <i class="fas fa-plus mr-2"></i> {{ __('+ Tambah Sales Order Baru') }}
                </a>
                </div>

                <div class="mt-4">
                    <table class="w-full border-collapse border border-gray-300 dark:border-gray-700">
                        <thead>
                            <tr class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">No.</th>
                                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Nama Pelanggan</th>
                                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">No SO</th>
                                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Tanggal SO</th>
                                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Po. Customer</th>
                                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Status</th>
                                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="7" class="border border-gray-300 dark:border-gray-700 px-4 py-2 text-center text-gray-500 dark:text-gray-400">
                                    No data available in table
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('#success-message').fadeOut();
                $('#error-message').fadeOut();
            }, 5000);
        });
    </script>
</x-app-layout>
