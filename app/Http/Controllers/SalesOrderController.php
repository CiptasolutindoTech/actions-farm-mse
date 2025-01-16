<?php

namespace App\Http\Controllers;

use App\Models\SalesOrder;
use Illuminate\Http\Request;

class SalesOrderController extends Controller
{
    /**
     * Menampilkan data supplier dengan pagination.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salesorder = SalesOrder::paginate(10);
        return view('content.SalesOrder.index', compact('salesorder'));
    }

     /**
     * Menampilkan form untuk membuat supplier.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.SalesOrder.create');
    }

    public function sales_quotation(){
        return view('content.SalesOrder.sales_quotation');
    }

}
