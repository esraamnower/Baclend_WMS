<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maintenance;

class MaintenanceController extends Controller
{
    public function index()
    {
        $maintenances = Maintenance::with('item')->latest()->paginate(10);
        return view('maintenance.index', compact('maintenances'));
    }
}