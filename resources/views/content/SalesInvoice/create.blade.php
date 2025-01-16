<x-app-layout>
    <div class="container mx-auto mt-6">
        <!-- Breadcrumbs -->
        <nav class="mb-4 mx-5" aria-label="Breadcrumb">
        <ol class="flex items-center space-x-2 text-sm text-gray-600">
                <li>
                    <a href="/dashboard" class="text-blue-600 font-semibold hover:text-blue-700">
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
                    <span class="mx-0">/</span>
                </li>
                <li>
                    <a href="{{ route('SalesInvoice.search-buyers-acknowledgment') }}"
                        class="text-blue-600 font-semibold hover:text-blue-700">
                        Daftar Sales Invoice
                    </a>
                </li>
                <li>
                    <span class="mx-1">/</span>
                </li>
                <li>
                    Tambah Invoice Penjualan
                </li>
            </ol>
        </nav>

        <!-- Page Title -->
        <div class="mx-5 mb-4">
            <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Form Tambah Invoice Penjualan</h1>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg shadow-lg p-6">
            <div class="flex justify-between items-center mb-4 px-6 py-4">
                <h2 class="text-xl font-semibold mb-4">Form Tambah</h2>
                <a href="{{ route('SalesInvoice.search-buyers-acknowledgment') }}"
                    class="bg-gray-500 text-white px-4 py-2 rounded">
                    < Kembali
                </a>
            </div>
            <form action="{{ route('SalesInvoice.store') }}" method="POST" class="space-y-6">
                @csrf
                <!-- Delivery Note No -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="delivery_note_no"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Delivery Note No
                        </label>
                        <input type="text" id="delivery_note_no" name="delivery_note_no"
                            class="mt-1 block w-full rounded-md shadow-sm bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200"
                            value="0002/SDN/XII/2024" readonly>
                    </div>
                    <div class="mb-4">
                        <label for="buyer" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Pembeli
                        </label>
                        <input type="text" id="buyer" name="buyer"
                            class="mt-1 block w-full rounded-md shadow-sm bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200"
                            value="daffa hanaris" readonly>
                    </div>
                </div>

                <!-- Sales Order Info -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="sales_order_no" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            No Sales Order
                        </label>
                        <input type="text" id="sales_order_no" name="sales_order_no"
                            class="mt-1 block w-full rounded-md shadow-sm bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200"
                            value="0002/SO/XII/2024" readonly>
                    </div>
                    <div>
                        <label for="sales_order_date"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Tanggal Sales Order
                        </label>
                        <input type="text" id="sales_order_date" name="sales_order_date"
                            class="mt-1 block w-full rounded-md shadow-sm bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200"
                            value="19/12/2024" readonly>
                    </div>
                </div>
                <!-- Expedition Info -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="expedition_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Nama Ekspedisi
                        </label>
                        <input type="text" id="expedition_name" name="expedition_name"
                            class="mt-1 block w-full rounded-md shadow-sm bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200"
                            value="JNE EXPRESS" readonly>
                    </div>
                    <div>
                        <label for="expedition_fee" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Biaya Ekspedisi
                        </label>
                        <input type="text" id="expedition_fee" name="expedition_fee"
                            class="mt-1 block w-full rounded-md shadow-sm bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200"
                            value="0,00" readonly>
                    </div>
                </div>
                <!-- Driver Info -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="driver_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Nama Pengemudi
                        </label>
                        <input type="text" id="driver_name" name="driver_name"
                            class="mt-1 block w-full rounded-md shadow-sm bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200"
                            value="daffa" readonly>
                    </div>
                    <div>
                        <label for="vehicle_plate" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Plat Nomor Kendaraan
                        </label>
                        <input type="text" id="vehicle_plate" name="vehicle_plate"
                            class="mt-1 block w-full rounded-md shadow-sm bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200"
                            value="AD1201308123" readonly>
                    </div>
                </div>
                <!-- Dates -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="delivery_note_date"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Tanggal Delivery Note
                        </label>
                        <input type="text" id="delivery_note_date" name="delivery_note_date"
                            class="mt-1 block w-full rounded-md shadow-sm bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200"
                            value="19/12/2024" readonly>
                    </div>
                    <div>
                        <label for="due_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Jatuh Tempo
                        </label>
                        <input type="date" id="due_date" name="due_date"
                            class="mt-1 block w-full rounded-md shadow-sm bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200"
                            placeholder="hh / bb / tttt">
                    </div>
                </div>
                <!-- Additional Info -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="tax_invoice_no" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            No Faktur Pajak
                        </label>
                        <input type="text" id="tax_invoice_no" name="tax_invoice_no"
                            class="mt-1 block w-full rounded-md shadow-sm bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                    </div>
                    <div>
                        <label for="buyer_receipt_no"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            No Penerimaan Pembeli
                        </label>
                        <input type="text" id="buyer_receipt_no" name="buyer_receipt_no"
                            class="mt-1 block w-full rounded-md shadow-sm bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200"
                            value="test" readonly>
                    </div>
                </div>

                <!-- Remarks -->
                <div class="mb-4">
                    <label for="remarks" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Keterangan
                    </label>
                    <textarea id="remarks" name="remarks" rows="3"
                        class="mt-1 block w-full rounded-md shadow-sm bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200"></textarea>
                </div>
            </form>
        </div>
    </div>

    <!-- Table -->
    <div class="container mx-auto mt-6">
        <div class="bg-white p-6 rounded-md shadow-md">
        <table class="w-full border-collapse border border-gray-300 text-gray-800">
            <thead>
                <tr class="bg-gray-100 text-gray-700">
                    <th class="border border-gray-300 px-4 py-2 text-left">No.</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Barang</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Qty BPB</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Harga Satuan</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Satuan</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Total</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Diskon 1</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Diskon 2</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Total Bayar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border border-gray-300 px-4 py-2 text-center">1</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <input type="text" value="12PC DOUBLE OPEN" readonly class="w-full bg-gray-100 px-2 py-1 rounded text-gray-800">
                    </td>
                    <td class="border border-gray-300 px-4 py-2">
                        <input type="number" value="10" readonly class="w-full bg-gray-100 px-2 py-1 rounded text-gray-800">
                    </td>
                    <td class="border border-gray-300 px-4 py-2">
                        <input type="text" value="100.000,00" readonly class="w-full bg-gray-100 px-2 py-1 rounded text-gray-800">
                    </td>
                    <td class="border border-gray-300 px-4 py-2">
                        <input type="text" value="PC" readonly class="w-full bg-gray-100 px-2 py-1 rounded text-gray-800">
                    </td>
                    <td class="border border-gray-300 px-4 py-2">
                        <input type="text" value="1,000,000.00" readonly class="w-full bg-gray-100 px-2 py-1 rounded text-gray-800">
                    </td>
                    <td class="border border-gray-300 px-4 py-2">
                        <input type="text" value="0.00" readonly class="w-full bg-gray-100 px-2 py-1 rounded text-gray-800">
                    </td>
                    <td class="border border-gray-300 px-4 py-2">
                        <input type="text" value="0.00" readonly class="w-full bg-gray-100 px-2 py-1 rounded text-gray-800">
                    </td>
                    <td class="border border-gray-300 px-4 py-2">
                        <input type="text" value="1,000,000.00" readonly class="w-full bg-gray-100 px-2 py-1 rounded text-gray-800">
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
            <div></div>
            <div></div>
            <div class="space-y-2">
                <div class="flex justify-between">
                    <span>Total:</span>
                    <input type="text" value="1.000.000,00" readonly class="bg-gray-100 px-2 py-1 rounded text-gray-800 w-32">
                </div>
                <div class="flex justify-between">
                    <span>Total PPN:</span>
                    <input type="text" value="110.000,00" readonly class="bg-gray-100 px-2 py-1 rounded text-gray-800 w-32">
                </div>
                <div class="flex justify-between">
                    <span>Subtotal:</span>
                    <input type="text" value="1.110.000,00" readonly class="bg-gray-100 px-2 py-1 rounded text-gray-800 w-32">
                </div>
            </div>
        </div>

        <div class="mt-6 flex justify-end space-x-4">
            <button class="bg-red-500 text-white px-4 py-2 rounded">Batal</button>
            <button class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
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
