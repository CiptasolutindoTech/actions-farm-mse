<x-app-layout>
    <div class="container mx-auto mt-6">
        <!-- Breadcrumbs -->
        <nav class="mb-4 mx-5" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-2 text-sm text-gray-600 dark:text-gray-400">
                <li>
                    <a href="/dashboard" class="text-blue-600 font-semibold hover:text-blue-700">
                        <i class="fas fa-home mr-1"></i> Home
                    </a>
                </li>
                <li>
                    <span class="mx-0">-</span>
                </li>
                <li>
                    <a href="{{ route('inventory-stock.index') }}" class="text-blue-600 font-semibold hover:text-blue-700">
                        Stock
                    </a>
                </li>
            </ol>
        </nav>
        {{-- <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-md shadow-lg overflow-hidden mx-5">
            <div class="flex justify-between items-center mb-6 mx-8 my-2">
                <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mx-2">Filter</h1>
            </div>
            <div class="flex justify-between items-center mb-6 mx-8 my-2">
                <div class="mb-4">
                    <label for="animal_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        {{ __('Nama Hewan') }}
                    </label>
                    <select id="animal_id" name="animal_id" required>
                        <option value="">Select Item</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="animal_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        {{ __('Nama Hewan') }}
                    </label>
                    <select id="animal_id" name="animal_id" required>
                        <option value="">Select Item</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="animal_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        {{ __('Nama Hewan') }}
                    </label>
                    <select id="animal_id" name="animal_id" required>
                        <option value="">Select Item</option>
                    </select>
                </div>
            </div>
        </div> --}}
        <!-- Card container -->
        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-md shadow-lg overflow-hidden mx-5 mt-5">
            <!-- Title and button container with justify-between -->
            <div class="flex justify-between items-center mb-6 mx-8 my-2">
                <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mx-2">Stock</h1>
                <a href="{{ route('unit.create') }}" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg inline-block transition duration-200 ease-in-out flex items-center">
                    <i class="fas fa-print mr-2"></i> {{ __('Export') }}
                </a>
            </div>

            <!-- Table Header -->
            <div class="overflow-x-auto mx-2">
                <table id="categoris-table" class="min-w-full bg-white dark:bg-gray-800 table-auto">
                    <thead class="bg-gray-100 dark:bg-gray-700">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-600 dark:text-gray-200"></th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-600 dark:text-gray-200">No</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-600 dark:text-gray-200">No Batch</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-600 dark:text-gray-200">Kategori</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-600 dark:text-gray-200">Barang</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-600 dark:text-gray-200">Qty</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-600 dark:text-gray-200">Satuan</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-600 dark:text-gray-200">Gudang</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-600 dark:text-gray-200">PO Customer</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-600 dark:text-gray-200">NRB</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-600 dark:text-gray-200">NRP</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-600 dark:text-gray-200">Tanggal Datang</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-600 dark:text-gray-200">Harga Beli</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-600 dark:text-gray-200">Harga Jual</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-600 dark:text-gray-200">Kadaluarsa</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-600 dark:text-gray-200">Created At</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-600 dark:text-gray-200">Updated At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($inv_item_stock as $stock)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="px-6 py-4 text-sm"></td>
                                <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">{{ $stock->category_id }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">{{ $stock->category_name }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">{{ $stock->category ? $stock->category->category_name : 'No Category' }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">{{ $stock->item ? $stock->item->item_name : 'No Item' }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">{{ $stock->quantity_unit }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">{{ $stock->unit ? $stock->unit->name : 'No Unit' }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">{{ $stock->warehouse ? $stock->warehouse->warehouse_name : 'No Warehouse' }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">{{ $stock->purchase_order_no }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">{{ $stock->no_retur_barang }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">{{ $stock->nota_retur_pajak }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">{{ $stock->item_stock_date }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">Rp.{{ number_format($stock->item_unit_cost) }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">Rp. {{ number_format($stock->item_unit_price) }}</td>
                                <?php if($stock['item_stock_expired_date']=='0000-00-00') {?>
                                    <td>-</td>
                                <?php } else {?>
                                    <td>{{date('d/m/Y', strtotime($stock['item_stock_expired_date']))}}</td>
                                <?php } ?>
                                <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">{{ $stock->created_at->format('d M Y') }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">{{ $stock->updated_at->format('d M Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-6 px-4 py-2">
                {{ $inv_item_stock->links() }}
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            $('#categoris-table').DataTable({
                paging: true, // Enable pagination
                searching: true, // Enable search functionality
                info: true, // Enable info display of DataTable
                order: [], // Optional: Remove default sorting
                lengthChange: true, // Enable length dropdown
                pageLength: 5, // Default number of rows
                language: {
                    search: "_INPUT_", // Use a custom placeholder for search box
                    searchPlaceholder: "Search ...",
                    paginate: {
                        next: '<i class="fas fa-chevron-right"></i>', // Custom pagination icon
                        previous: '<i class="fas fa-chevron-left"></i>'
                    },
                    lengthMenu: "Show _MENU_ entries",
                    info: "Showing _START_ to _END_ of _TOTAL_ entries"
                },
                dom: '<"flex justify-between items-center mb-4"<"flex items-center"l><f>>rt<"flex justify-between items-center mt-4"ip>',
                drawCallback: function() {
                    $('table tbody tr').addClass('hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-200');
                }
            });


            setTimeout(function() {
                $('#success-message').fadeOut();
                $('#error-message').fadeOut();
            }, 5000);
        });

        function confirmDelete(button) {
            if (confirm('Are you sure you want to delete this item? This action cannot be undone.')) {
                button.closest('form').submit();
            }
        }
    </script>
</x-app-layout>
