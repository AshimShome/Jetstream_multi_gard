<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function adminDashboard()
    {
        
        return view('admin.dashboard');

    }
}
