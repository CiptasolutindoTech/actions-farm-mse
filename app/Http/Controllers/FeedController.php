<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeedController extends Controller
{
    /**
     * Menampilkan data Feed dengan pagination.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feeds = Feed::paginate(10);
        return view('content.Feed.index', compact('feeds'));
    }

    /**
     * Menampilkan form untuk membuat Feed.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Item::all(); // Ambil semua data item
        return view('feed.create', compact('items'));
    }

    /**
     * Menyimpan data Feed baru.
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
                'item_id' => 'required|exists:items,id', // Validasi untuk item_id
                'feed_type' => 'required|in:Herbivore,Carnivore,Omnivore', // Validasi untuk feed_type
                'expiration_date' => 'required|date|after:today', // Validasi untuk expiration_date
            ]);

            // Create the new feed
            Feed::create([
                'item_id' => $request->item_id,
                'feed_type' => $request->feed_type,
                'expiration_date' => $request->expiration_date,
            ]);

            // Commit the transaction
            DB::commit();

            // Flash success message to session
            session()->flash('success', 'Feed created successfully.');
        } catch (\Exception $e) {
            // Rollback the transaction if something goes wrong
            DB::rollBack();

            // Flash error message to session
            session()->flash('error', 'Failed to create feed. Please try again.');
        }

        return redirect()->route('feed.index');
    }

    /**
     * Menampilkan form edit untuk Feed.
     *
     * @param \App\Models\Feed $feed
     * @return \Illuminate\Http\Response
     */
    public function edit(Feed $feed)
    {
        return view('content.Feed.edit', compact('feed'));
    }

    /**
     * Memperbarui data Feed.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Feed $feed
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Feed $feed)
    {
        // Start a database transaction
        DB::beginTransaction();

        try {
            // Validate the request data
            $request->validate([
                'feed_type' => 'required|in:Herbivore,Carnivore,Omnivore',
                'expiration_date' => 'required|date',
            ]);

            // Update the Feed
            $feed->update($request->all());

            // Commit the transaction
            DB::commit();

            // Flash success message to session
            session()->flash('success', 'Feed updated successfully.');
        } catch (\Exception $e) {
            // Rollback the transaction if something goes wrong
            DB::rollBack();

            // Flash error message to session
            session()->flash('error', 'Failed to update feed. Please try again.');
        }

        return redirect()->route('feed.index');
    }

    /**
     * Menghapus Feed.
     *
     * @param \App\Models\Feed $feed
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Feed $feed)
    {
        // Start a database transaction
        DB::beginTransaction();

        try {
            // Delete the Feed
            $feed->delete();

            // Commit the transaction
            DB::commit();

            // Flash success message to session
            session()->flash('success', 'Feed deleted successfully.');
        } catch (\Exception $e) {
            // Rollback the transaction if something goes wrong
            DB::rollBack();

            // Flash error message to session
            session()->flash('error', 'Failed to delete feed. Please try again.');
        }

        return redirect()->route('feed.index');
    }
}
