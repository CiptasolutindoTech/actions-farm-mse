<?php

namespace App\Http\Controllers;

use App\Models\Purchase_Order;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    /**
     * Menampilkan data Category dengan pagination.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchase_order = Purchase_Order::paginate(10);
        return view('content.PurchaseOrder.index', compact('purchase_order'));
    }
    /**
     * Menampilkan form untuk membuat Category.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.Category.create');
    }
    /**
     * Menyimpan data Category baru.
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
            $request->validate([
                'category_name' => 'required',
            ]);

            // Create the new Category
            Category::create($request->all());

            // Commit the transaction
            DB::commit();

            // Flash success message to session
            session()->flash('success', 'Category created successfully.');
        } catch (\Exception $e) {
            // Rollback the transaction if something goes wrong
            DB::rollBack();

            // Flash error message to session
            session()->flash('error', 'Failed to create category. Please try again.');
        }

        return redirect()->route('category.index');
    }
    public function edit(Category $category)
    {
        return view('content.Category.edit', compact('category'));
    }

    /**
     * Memperbarui data Category.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Category $category)
    {
        // Start a database transaction
        DB::beginTransaction();

        try {
            // Validate the request data
            $request->validate([
                'category_name' => 'required',
            ]);

            // Update the Category
            $category->update($request->all());

            // Commit the transaction
            DB::commit();

            // Flash success message to session
            session()->flash('success', 'Category updated successfully.');
        } catch (\Exception $e) {
            // Rollback the transaction if something goes wrong
            DB::rollBack();

            // Flash error message to session
            session()->flash('error', 'Failed to update category. Please try again.');
        }

        return redirect()->route('category.index');
    }

    /**
     * Menghapus Category.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $category)
    {
        // Start a database transaction
        DB::beginTransaction();

        try {
            // Delete the Category
            $category->delete();

            // Commit the transaction
            DB::commit();

            // Flash success message to session
            session()->flash('success', 'Category deleted successfully.');
        } catch (\Exception $e) {
            // Rollback the transaction if something goes wrong
            DB::rollBack();

            // Flash error message to session
            session()->flash('error', 'Failed to delete category. Please try again.');
        }

        return redirect()->route('category.index');
    }
}
