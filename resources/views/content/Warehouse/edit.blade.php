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
                    <a href="{{ route('Warehouse.index') }}" class="text-blue-600 font-semibold hover:text-blue-700">
                        Warehouse
                    </a>
                </li>
                <li>
                    <span class="mx-0">-</span>
                </li>
                <li>
                    <span class="text-gray-600 dark:text-gray-400">Edit Warehouse</span>
                </li>
            </ol>
        </nav>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <form action="{{ route('Warehouse.update', $Warehouse) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Warehouse Code -->
                            <div class="mb-4">
                                <label for="warehouse_code" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Kode Gudang
                                </label>
                                <input type="text" name="warehouse_code" id="warehouse_code" class="mt-1 block w-full rounded-md shadow-sm bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200" value="{{ old('warehouse_code', $Warehouse->warehouse_code) }}">
                                @error('warehouse_code')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Warehouse Name -->
                            <div class="mb-4">
                                <label for="warehouse_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Nama Gudang
                                </label>
                                <input type="text" name="warehouse_name" id="warehouse_name" class="mt-1 block w-full rounded-md shadow-sm bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200" value="{{ old('warehouse_name', $Warehouse->warehouse_name) }}">
                                @error('warehouse_name')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Warehouse Type -->
                            <div class="mb-4">
                                <label for="warehouse_type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Jenis Gudang
                                </label>
                                <input type="text" name="warehouse_type" id="warehouse_type" class="mt-1 block w-full rounded-md shadow-sm bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200" value="{{ old('warehouse_type', $Warehouse->warehouse_type) }}">
                                @error('warehouse_type')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Warehouse Location -->
                            <div class="mb-4">
                                <label for="warehouse_location_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Lokasi
                                </label>
                                <select name="warehouse_location_id" id="warehouse_location_id" class="mt-1 block w-full rounded-md shadow-sm bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                                    <option value="">Pilih Lokasi</option>
                                    @foreach($warehouselocation as $location)
                                        <option value="{{ $location->warehouse_location_id }}" {{ old('warehouse_location_id', $Warehouse->warehouse_location_id) == $location->warehouse_location_id ? 'selected' : '' }}>
                                            {{ $location->warehouse_location_code }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('warehouse_location_id')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Warehouse Address -->
                            <div class="mb-4">
                                <label for="warehouse_address" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Alamat
                                </label>
                                <input type="text" name="warehouse_address" id="warehouse_address" class="mt-1 block w-full rounded-md shadow-sm bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200" value="{{ old('warehouse_address', $Warehouse->warehouse_address) }}">
                                @error('warehouse_address')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Warehouse Phone -->
                            <div class="mb-4">
                                <label for="warehouse_phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    No. Telepon
                                </label>
                                <input type="text" name="warehouse_phone" id="warehouse_phone" class="mt-1 block w-full rounded-md shadow-sm bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200" value="{{ old('warehouse_phone', $Warehouse->warehouse_phone) }}">
                                @error('warehouse_phone')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Warehouse Remark -->
                            <div class="mb-4">
                                <label for="warehouse_remark" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Keterangan
                                </label>
                                <textarea name="warehouse_remark" id="warehouse_remark" class="mt-1 block w-full rounded-md shadow-sm bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200">{{ old('warehouse_remark', $Warehouse->warehouse_remark) }}</textarea>
                                @error('warehouse_remark')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex justify-start">
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mr-2">
                                    Simpan
                                </button>
                                <a href="{{ route('Warehouse.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">
                                    Batal
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
