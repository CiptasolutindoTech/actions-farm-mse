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
                        <i class="fas fa-home mr-1"></i> Home
                    </a>
                </li>
                <li>
                    <span class="mx-0">-</span>
                </li>
                <li>
                    <a href="{{ route('WarehouseLocation.index') }}" class="text-blue-600 font-semibold hover:text-blue-700">
                        Warehouse
                    </a>
                </li>
            </ol>
        </nav>

        <!-- Card container -->
        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-md shadow-lg overflow-hidden mx-5">
            <!-- Title and button container with justify-between -->
            <div class="flex justify-between items-center mb-6 mx-8 my-2">
                <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mx-2">Warehouse</h1>
                <a href="{{ route('WarehouseLocation.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg inline-block transition duration-200 ease-in-out flex items-center">
                    <i class="fas fa-plus mr-2"></i> {{ __('Add Warehouse') }}
                </a>
            </div>

            <!-- Table Header -->
            <div class="overflow-x-auto mx-2">
                <table id="warehouses-table" class="min-w-full bg-white dark:bg-gray-800 table-auto">
                    <thead class="bg-gray-100 dark:bg-gray-700">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-600 dark:text-gray-200"></th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-600 dark:text-gray-200">No</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-600 dark:text-gray-200">Code</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-600 dark:text-gray-200">Provinsi Lokasi Gudang </th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-600 dark:text-gray-200">Kota Lokasi Gudang</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-600 dark:text-gray-200">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($warehouses as $warehouse)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="px-6 py-4 text-sm"></td>
                                <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">{{ $warehouse->warehouse_location_code }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">{{ $warehouse->province ? $warehouse->province->province_name : 'No code' }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">{{ $warehouse->city ? $warehouse->city->city_name : 'No code' }}</td>
                                <td class="px-6 py-4 text-sm flex space-x-2">
                                    <a href="{{ route('WarehouseLocation.edit', $warehouse->warehouse_location_id) }}"
                                       class="bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-300 px-3 py-1 rounded-lg hover:bg-blue-200 dark:hover:bg-blue-800 transition duration-200 ease-in-out flex items-center">
                                        <i class="fas fa-edit mr-1"></i> Edit
                                    </a>

                                    <form action="{{ route('WarehouseLocation.destroy', $warehouse->warehouse_location_id) }}" method="POST" class="delete-form inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button"
                                                onclick="confirmDelete(this)"
                                                class="bg-red-100 dark:bg-red-900 text-red-700 dark:text-red-300 px-3 py-1 rounded-lg hover:bg-red-200 dark:hover:bg-red-800 transition duration-200 ease-in-out flex items-center">
                                            <i class="fas fa-trash-alt mr-1"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-6 px-4 py-2">
                {{ $warehouses->links() }}
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#warehouses-table').DataTable({
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