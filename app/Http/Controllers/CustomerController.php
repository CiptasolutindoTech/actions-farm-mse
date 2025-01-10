<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Menampilkan daftar Core Branch dengan pagination.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::paginate(10); // Mengambil data Core Branch dengan pagination
        return view('content.Customer.index', compact('customers'));
    }
    /**
     * Menampilkan form untuk membuat Feed.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all(); // Ambil semua data item
        return view('content.Customer.create', compact('customers'));
    }

    /**
     * Store a newly created customer in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Start a database transaction
        DB::beginTransaction();

        try {
            // Validate the request data
            $validatedData = $request->validate([
                'customer_code' => 'required|string|max:255',
                'customer_name' => 'required|string|max:255',
                'customer_address' => 'nullable|string|max:255',
                'customer_email' => 'nullable|email|max:255',
                'customer_contact_person' => 'nullable|string|max:255',
                'amount_debt'       => 'required|integer|min:0',
            ]);

            // Create a new customer record
            Customer::create($validatedData);

            // Commit the transaction
            DB::commit();

            // Flash success message to session
            session()->flash('success', 'Customer created successfully.');
        } catch (\Exception $e) {
            // Rollback the transaction if an error occurs
            DB::rollBack();

            // Flash error message to session
            session()->flash('error', 'Failed to create customer. Please try again.');
        }

        return redirect()->route('customer.index');
    }

    /**
     * Show the form for editing the specified customer.
     *
     * @param \App\Models\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('content.Customer.edit', compact('customer'));
    }

     /**
     * Update the specified customer in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Customer $customer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Customer $customer)
    {
        // Start a database transaction
        DB::beginTransaction();

        try {
            // Validate the request data
            $validatedData = $request->validate([
                'customer_code' => 'required|string|max:255',
                'customer_name' => 'required|string|max:255',
                'customer_address' => 'nullable|string|max:255',
                'customer_email' => 'nullable|email|max:255',
                'customer_contact_person' => 'nullable|string|max:255',
                'amount_debt'       => 'required|integer|min:0',
            ]);

            // Update the customer record
            $customer->update($validatedData);

            // Commit the transaction
            DB::commit();

            // Flash success message to session
            session()->flash('success', 'Customer updated successfully.');
        } catch (\Exception $e) {
            // Rollback the transaction if an error occurs
            DB::rollBack();

            // Flash error message to session
            session()->flash('error', 'Failed to update customer. Please try again.');
        }

        return redirect()->route('customer.index');
    }

    /**
     * Remove the specified customer from storage.
     *
     * @param \App\Models\Customer $customer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Customer $customer)
    {
        // Start a database transaction
        DB::beginTransaction();

        try {
            // Delete the customer record
            $customer->delete();

            // Commit the transaction
            DB::commit();

            // Flash success message to session
            session()->flash('success', 'Customer deleted successfully.');
        } catch (\Exception $e) {
            // Rollback the transaction if an error occurs
            DB::rollBack();

            // Flash error message to session
            session()->flash('error', 'Failed to delete customer. Please try again.');
        }

        return redirect()->route('customer.index');
    }

}
