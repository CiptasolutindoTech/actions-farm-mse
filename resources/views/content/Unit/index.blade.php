<x-app-layout>
    <div class="container mx-auto mt-6">

        <!-- Card container -->
        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl shadow-lg overflow-hidden mx-8">

            <!-- Title and button container with justify-between -->
            <div class="flex justify-between items-center mb-6 mx-8 my-2">
                <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Units</h1>
                <a href="{{ route('unit.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg inline-block transition duration-200 ease-in-out flex items-center">
                    <i class="fas fa-plus mr-2"></i> {{ __('Create Unit') }}
                </a>
            </div>

            <!-- Table Header -->
            <div class="overflow-x-auto">
                <table id="units-table" class="min-w-full bg-white dark:bg-gray-800 table-auto">
                    <thead class="bg-gray-100 dark:bg-gray-700">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-600 dark:text-gray-200">ID</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-600 dark:text-gray-200">Code</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-600 dark:text-gray-200">Name</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-600 dark:text-gray-200">Created At</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-600 dark:text-gray-200">Updated At</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-600 dark:text-gray-200">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($units as $unit)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">{{ $unit->id }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">{{ $unit->code }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">{{ $unit->name }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">{{ $unit->created_at->format('d M Y') }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">{{ $unit->updated_at->format('d M Y') }}</td>
                                <td class="px-6 py-4 text-sm">
                                    <a href="{{ route('unit.edit', $unit->id) }}" class="text-blue-500 hover:text-blue-700 transition duration-200 ease-in-out">Edit</a>
                                    <form action="{{ route('unit.destroy', $unit->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 transition duration-200 ease-in-out">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-6 px-4 py-2">
                {{ $units->links() }}
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        $(document).ready(function() {
            // Initialize DataTables with an ID or class selector
            $('#units-table').DataTable({
                paging: true, // Enable pagination
                searching: true, // Enable search functionality
                info: true, // Enable info display of DataTable
                order: [], // Optional: Remove default sorting
            });
        });
    </script>
    @endpush
</x-app-layout>
