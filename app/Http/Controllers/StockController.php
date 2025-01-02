<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Menampilkan data Stock dengan pagination.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inv_item_stock = Stock::with(['category', 'unit', 'item', 'warehouse'])->paginate(10);
        return view('content.Stock.index', compact('inv_item_stock'));
    }
}
