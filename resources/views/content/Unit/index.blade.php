<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Units') }}
        </h2>
    </x-slot>

    <div class="container mx-auto">
        <h1 class="text-xl font-bold">Units</h1>
        <a href="{{ route('unit.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
            {{ __('Create Unit') }}
        </a>

        <table id="units-table" class="min-w-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

    @push('scripts')
    <script>
        $(document).ready(function() {
            let options = @json((new \App\DataTables\UnitDataTable)->html());
            options.ajax = "{{ route('unit.index') }}";
            $('#units-table').DataTable(options);
        });
    </script>
    @endpush
</x-app-layout>
