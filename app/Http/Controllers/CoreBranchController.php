<?php

namespace App\Http\Controllers;

use App\Models\CoreBranch;
use Illuminate\Http\Request;

class CoreBranchController extends Controller
{
    /**
     * Menampilkan daftar Core Branch dengan pagination.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = CoreBranch::paginate(10); // Mengambil data Core Branch dengan pagination
        return view('content.CoreBranch.index', compact('branches'));
    }
}
