<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Arrear;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $arrears = Arrear::all();
        // dd($arrears);
        return view('admin.reports.index');
    }
}
