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
        $totalVerifiedCount = Stock::whereIn('status', ['verified', 'authorized'])->sum('quantity');

        
        $totalDispatchCount = Stock::whereIn('allocation', ['IT', 'HR'])->sum('quantity');

        $totalInstalledCount = Stock::whereIn('installation', ['yes'])->sum('quantity');                   


        // Fetch asset types and their quantities-stock pie chart
        $stockData = Stock::select('item_type', Stock::raw('SUM(quantity) as total_quantity'))
                            ->groupBy('item_type')
                            ->get();
         // Fetch asset types and their quantities-asset pie chart
        $assetData = Stock::selectRaw('item_type, SUM(quantity) as asset_quantity')
                            ->whereIn('status', ['verified', 'authorized'])
                            ->groupBy('item_type')
                            ->get();
       
        // Prepare data for stock pie chart
        $Slabels = $stockData->pluck('item_type'); // Asset types
        $Sdata = $stockData->pluck('total_quantity'); // Corresponding quantities

        // Prepare data for stock asset chart
        $Alabels = $assetData->pluck('item_type'); // Asset types
        $Adata = $assetData->pluck('asset_quantity'); // Corresponding quantities

        return view('index', compact('totalStockCount','totalVerifiedCount','totalDispatchCount','totalInstalledCount', 'Slabels', 'Sdata','Alabels','Adata'));
    }
}
