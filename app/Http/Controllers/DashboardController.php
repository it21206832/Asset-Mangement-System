<?php

namespace App\Http\Controllers;
use App\Models\Stock;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch total stock count for all items
        $totalStockCount = Stock::sum('quantity');

         // Fetch total count of assets with status 'verified' or 'authorized'
        $totalVerifiedCount = Stock::whereIn('status', ['verified', 'authorized'])->count();

        
        $totalDispatchCount = Stock::whereIn('allocation', ['IT', 'HR'])->count();

        // Fetch asset types and their quantities
        $assetData = Stock::select('item_type', Stock::raw('SUM(quantity) as total_quantity'))
                            ->groupBy('item_type')
                            ->get();

        $totalInstalledCount = Stock::whereIn('installation', ['yes'])->count();                   

        // Prepare data for Chart.js
        $labels = $assetData->pluck('item_type'); // Asset types
        $data = $assetData->pluck('total_quantity'); // Corresponding quantities

        return view('index', compact('totalStockCount','totalVerifiedCount','totalDispatchCount','totalInstalledCount', 'labels', 'data'));
    }
}
