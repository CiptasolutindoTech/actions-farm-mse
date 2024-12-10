<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $feed = Feed::with('item')->get(); // Mengambil semua data feed beserta relasinya ke item
        return response()->json($feed);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:item,id|unique:feed,item_id',
            'feed_type' => 'required|string',
            'expiration_date' => 'required|date',
        ]);

        $feed = Feed::create($request->all());
        return response()->json(['message' => 'Feed created successfully', 'feed' => $feed], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $feed = Feed::with('item')->findOrFail($id);
        return response()->json($feed);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $feed = Feed::findOrFail($id);

        $request->validate([
            'feed_type' => 'sometimes|required|string',
            'expiration_date' => 'sometimes|required|date',
        ]);

        $feed->update($request->all());
        return response()->json(['message' => 'Feed updated successfully', 'feed' => $feed]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $feed = Feed::findOrFail($id);
        $feed->delete();
        return response()->json(['message' => 'Feed deleted successfully']);
    }
}
