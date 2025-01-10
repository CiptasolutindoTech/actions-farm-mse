<x-app-layout>
    <div class="container mx-auto mt-6">

        <!-- Flash Message Notification -->
        @if (session('success'))
        <div class="fixed top-2 left-1/2 transform -translate-x-1/2 z-50 bg-green-500 text-white py-3 px-6 rounded-md shadow-md flex items-center space-x-2 mb-4 transition-transform duration-300"
            id="success-message">
            <i class="fas fa-check-circle"></i>
            <span>{{ session('success') }}</span>
        </div>
        @elseif (session('error'))
        <div class="fixed top-2 left-1/2 transform -translate-x-1/2 z-50 bg-red-500 text-white py-3 px-6 rounded-md shadow-md flex items-center space-x-2 mb-4 transition-transform duration-300"
            id="error-message">
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
                    <a href="{{ route('Supplier.index') }}" class="text-blue-600 font-semibold hover:text-blue-700">
                        Suppliers
                    </a>
                </li>
                <li>
                    <span class="mx-0">-</span>
                </li>
                <li>
                    Edit Supplier
                </li>
            </ol>
        </nav>

        <!-- Card container -->
        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-md shadow-lg overflow-hidden mx-5">
            <!-- Title -->
            <div class="flex justify-between items-center mb-6 mx-8 my-2">
                <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mx-2">Edit Supplier</h1>
            </div>

            <!-- Form to Edit Supplier -->
            <form action="{{ route('Supplier.update', $Supplier->supplier_id) }}" method="POST" class="space-y-6 mx-8 my-4">
                @csrf
                @method('PUT')
                <div>
                    <label for="supplier_name" class="block text-sm font-medium text-gray-600 dark:text-gray-200">Supplier Name</label>
                    <input type="text" id="supplier_name" name="supplier_name" value="{{ old('supplier_name', $Supplier->supplier_name) }}" 
                        class="mt-2 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    @error('supplier_name')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="supplier_address" class="block text-sm font-medium text-gray-600 dark:text-gray-200">Supplier Address</label>
                    <textarea id="supplier_address" name="supplier_address" rows="3"
                        class="mt-2 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('supplier_address', $Supplier->supplier_address) }}</textarea>
                    @error('supplier_address')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="supplier_code" class="block text-sm font-medium text-gray-600 dark:text-gray-200">Supplier Code</label>
                    <input type="text" id="supplier_code" name="supplier_code" value="{{ old('supplier_code', $Supplier->supplier_code) }}" 
                        class="mt-2 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    @error('supplier_code')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="supplier_email" class="block text-sm font-medium text-gray-600 dark:text-gray-200">Supplier Email</label>
                    <input type="email" id="supplier_email" name="supplier_email" value="{{ old('supplier_email', $Supplier->supplier_email) }}" 
                        class="mt-2 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('supplier_email')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="supplier_mobile_phone1" class="block text-sm font-medium text-gray-600 dark:text-gray-200">Mobile Phone 1</label>
                    <input type="text" id="supplier_mobile_phone1" name="supplier_mobile_phone1" value="{{ old('supplier_mobile_phone1', $Supplier->supplier_mobile_phone1) }}" 
                        class="mt-2 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('supplier_mobile_phone1')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="amount_debt" class="block text-sm font-medium text-gray-600 dark:text-gray-200">Hutang</label>
                    <input type="text" id="amount_debt" name="amount_debt" value="{{ old('amount_debt', $Supplier->amount_debt) }}" 
                        class="mt-2 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('amount_debt')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex justify-end space-x-4">
                    <a href="{{ route('Supplier.index') }}" 
                        class="bg-gray-300 text-gray-700 px-6 py-2 rounded-lg inline-block hover:bg-gray-400">
                        Cancel
                    </a>
                    <button type="submit" 
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg inline-block transition duration-200 ease-in-out">
                        <i class="fas fa-save mr-2"></i> Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        setTimeout(function () {
            $('#success-message').fadeOut();
            $('#error-message').fadeOut();
        }, 5000);
    </script>
</x-app-layout>
