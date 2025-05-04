<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    function showDashboard(): View
    {
        return view('dashboard', [
            'title' => 'Dashboard Couriers manager!'
        ]);
    }
}
