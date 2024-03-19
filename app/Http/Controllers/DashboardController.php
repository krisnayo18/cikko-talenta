<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // addVendors(['amcharts', 'amcharts-maps', 'amcharts-stock']);
        return view('dashboard');
    }
}
