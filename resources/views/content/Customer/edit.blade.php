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
                    <a href="{{ route('customer.index') }}" class="text-blue-600 font-semibold hover:text-blue-700">
                        Customer
                    </a>
                </li>
                <li>
                    <span class="mx-0">-</span>
                </li>
                <li>
                    <span class="text-gray-600 dark:text-gray-400">Edit Customer</span>
                </li>
            </ol>
        </nav>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <!-- Edit Form -->
                        <form action="{{ route('customer.update', $customer) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Customer Code -->
                            <div class="mb-4">
                                <label for="customer_code" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    {{ __('Customer Code') }}
                                </label>
                                <input type="text" name="customer_code" id="customer_code" value="{{ $customer->customer_code }}" class="mt-1 block w-full rounded-md shadow-sm bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                                @error('customer_code')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Customer Name -->
                            <div class="mb-4">
                                <label for="customer_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    {{ __('Customer Name') }}
                                </label>
                                <input type="text" name="customer_name" id="customer_name" value="{{ $customer->customer_name }}" class="mt-1 block w-full rounded-md shadow-sm bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                                @error('customer_name')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Customer Address -->
                            <div class="mb-4">
                                <label for="customer_address" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    {{ __('Customer Address') }}
                                </label>
                                <textarea name="customer_address" id="customer_address" rows="3" class="mt-1 block w-full rounded-md shadow-sm bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200">{{ $customer->customer_address }}</textarea>
                                @error('customer_address')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Customer Email -->
                            <div class="mb-4">
                                <label for="customer_email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    {{ __('Customer Email') }}
                                </label>
                                <input type="email" name="customer_email" id="customer_email" value="{{ $customer->customer_email }}" class="mt-1 block w-full rounded-md shadow-sm bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                                @error('customer_email')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Customer Contact Person -->
                            <div class="mb-4">
                                <label for="customer_contact_person" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    {{ __('Customer Contact Person') }}
                                </label>
                                <input type="text" name="customer_contact_person" id="customer_contact_person" value="{{ $customer->customer_contact_person }}" class="mt-1 block w-full rounded-md shadow-sm bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                                @error('customer_contact_person')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="amount_debt" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    {{ __('Piutang') }}
                                </label>
                                <input type="number" name="amount_debt" id="amount_debt" value="{{ $customer->amount_debt }}" class="mt-1 block w-full rounded-md shadow-sm bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                                @error('amount_debt')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Submit and Cancel Buttons -->
                            <div class="flex justify-start">
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mr-2">
                                    {{ __('Save Changes') }}
                                </button>
                                <a href="{{ route('customer.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">
                                    {{ __('Cancel') }}
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        setTimeout(function () {
            $('#success-message').fadeOut();
            $('#error-message').fadeOut();
        }, 5000);
    </script>
</x-app-layout>
