<?php

namespace App\Http\Controllers;

use App\Models\Cage;
use App\Models\Hewan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CageController extends Controller
{
    /**
     * Menampilkan data Cage dengan pagination.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cages = Cage::paginate(10);
        return view('content.Cage.index', compact('cages'));
    }
    /**
     * Menampilkan form untuk membuat Cage.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $animals = Hewan::all();
        return view('content.Cage.create', compact('animals'));
    }
    /**
     * Menyimpan data Cage baru.
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
            $request->validate(rules: [
                'cage_name' => 'required|string|max:255',
                'location' => 'required|string|max:255',
                'capacity' => 'required|integer|min:0',
                'animal_id' => 'required|exists:animals,animal_id',
            ]);

            // Create the new Category
            Cage::create($request->all());

            // Commit the transaction
            DB::commit();

            // Flash success message to session
            session()->flash('success', 'Cage created successfully.');
        } catch (\Exception $e) {
            // Rollback the transaction if something goes wrong
            DB::rollBack();

            // Flash error message to session
            session()->flash('error', 'Failed to create cage. Please try again.');
        }

        return redirect()->route('cage.index');
    }
    public function edit(Category $categoris)
    {
        return view('content.Category.edit', compact('categoris'));
    }

    /**
     * Memperbarui data Category.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Category $categoris
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Category $categoris)
    {
        // Start a database transaction
        DB::beginTransaction();

        try {
            // Validate the request data
            $request->validate([
                'category_name' => 'required',
            ]);

            // Update the Category
            $categoris->update($request->all());

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
     * @param \App\Models\Category $categoris
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $categoris)
    {
        // Start a database transaction
        DB::beginTransaction();

        try {
            // Delete the Category
            $categoris->delete();

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
