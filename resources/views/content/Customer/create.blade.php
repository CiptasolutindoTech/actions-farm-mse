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
                    <a href="{{ route('customer.index') }}" class="text-blue-600 font-semibold hover:text-blue-700">
                        Customer
                    </a>
                </li>
                <li>
                    <span class="mx-0">-</span>
                </li>
                <li>
                    <span class="text-gray-600 dark:text-gray-400">Add Customer</span>
                </li>
            </ol>
        </nav>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <form action="{{ route('customer.store') }}" method="POST">
                            @csrf
                            <!-- Customer Code -->
                            <div class="mb-4">
                                <label for="customer_code" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    {{ __('Customer Code') }}
                                </label>
                                <input type="text" name="customer_code" id="customer_code" class="mt-1 block w-full rounded-md shadow-sm bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                                @error('customer_code')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Customer Name -->
                            <div class="mb-4">
                                <label for="customer_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    {{ __('Customer Name') }}
                                </label>
                                <input type="text" name="customer_name" id="customer_name" class="mt-1 block w-full rounded-md shadow-sm bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                                @error('customer_name')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>


                            <!-- Customer Address -->
                            <div class="mb-4">
                                <label for="customer_address" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    {{ __('Customer Address') }}
                                </label>
                                <textarea name="customer_address" id="customer_address" rows="3" class="mt-1 block w-full rounded-md shadow-sm bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200"></textarea>
                                @error('customer_address')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Customer Email -->
                            <div class="mb-4">
                                <label for="customer_email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    {{ __('Customer Email') }}
                                </label>
                                <input type="email" name="customer_email" id="customer_email" class="mt-1 block w-full rounded-md shadow-sm bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                                @error('customer_email')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Customer Contact Person -->
                            <div class="mb-4">
                                <label for="customer_contact_person" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    {{ __('Customer Contact Person') }}
                                </label>
                                <input type="text" name="customer_contact_person" id="customer_contact_person" class="mt-1 block w-full rounded-md shadow-sm bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                                @error('customer_contact_person')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            </div>

                            <div class="flex justify-start">
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mr-2">
                                    {{ __('Save') }}
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
</x-app-layout>
