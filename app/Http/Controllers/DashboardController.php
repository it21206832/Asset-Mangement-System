<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\Stock;
use App\Models\User;

use Illuminate\Http\Request;
use Carbon\Carbon;


class DashboardController  extends Controller
{
    public function index()
    {
     // Fetch total stock count for all items
     $totalStockCount = Stock::sum('quantity');

     // Fetch total user count
     $totalUserCount = User::where('userType', 'Admin')              
                    ->count();


     // Fetch total count of assets with status 'verified' or 'authorized'
     $totalVerifiedCount = Stock::whereIn('status', ['verified', 'authorized'])->sum('quantity');

     // Fetch total count of assets allocation except for 'None'
     $totalDispatchCount = Stock::where('allocation', '!=', 'None')->sum('quantity');

     // Fetch total count of assets installation(IT)
     $totalInstalledCount = Stock::whereIn('installation', ['yes'])->sum('quantity');


     // Fetch  stck data for the previous month
     $previousMonth = Carbon::now()->subMonth();
     $lastMonthStockCount = Stock::whereMonth('created_at', $previousMonth->month)
                                 ->whereYear('created_at', $previousMonth->year)
                                 ->sum('quantity');

     // Fetch stck data for the current month (which you can consider as the "next" month in your scenario)
     $nextMonth = Carbon::now(); // Alternatively, adjust as per your "next month" definition
     $nextMonthStockCount = Stock::whereMonth('created_at', $nextMonth->month)
                                 ->whereYear('created_at', $nextMonth->year)
                                 ->sum('quantity');
     // Calculate percentage increase or decrease
     if ($lastMonthStockCount > 0) {
         $percentageChange = (($nextMonthStockCount - $lastMonthStockCount) / $lastMonthStockCount) * 100;
     } else {
         $percentageChange = 0; // Avoid division by zero if no stock last month
     }

     // Fetch  total count of assets with status 'verified' or 'authorized' data for the previous month
     $previousMonth = Carbon::now()->subMonth();
     $lastMonthAuthorizedStockCount = Stock::whereMonth('created_at', $previousMonth->month)
                                 ->whereYear('created_at', $previousMonth->year)
                                 ->whereIn('status', ['verified', 'authorized']) 
                                 ->sum('quantity');

     // Fetch total count of assets with status 'verified' or 'authorized' data for the current month (which you can consider as the "next" month in your scenario)
     $nextMonth = Carbon::now(); // Alternatively, adjust as per your "next month" definition
     $nextMonthAuthorizedStockCount = Stock::whereMonth('created_at', $nextMonth->month)
                                 ->whereYear('created_at', $nextMonth->year)
                                 ->whereIn('status', ['verified', 'authorized']) 
                                 ->sum('quantity');

     // Calculate percentage increase or decrease
     if ($lastMonthAuthorizedStockCount > 0) {
         $AuthorizedpercentageChange = (($nextMonthAuthorizedStockCount - $lastMonthAuthorizedStockCount) / $lastMonthAuthorizedStockCount) * 100;
     } else {
         $AuthorizedpercentageChange = 0; // Avoid division by zero if no stock last month
     }

     // Fetch total user count
     $totalUserCount = User::count();


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

     // Fetch all assets with their details
     $assets = Stock::select('id', 'allocation', 'allocation_quantitity', 'status', 'damage')
         ->whereIn('status', ['verified', 'authorized'])
         ->get();

    //line chart
    $currentYear = Carbon::now()->year;

    $line1Data = Stock::selectRaw("DATE_FORMAT(created_at, '%Y-%m') as month, SUM(damage) as total")
                    
                    ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m')"))
                    ->orderBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m')"))
                    ->get();

    $line2Data = Stock::selectRaw("DATE_FORMAT(created_at, '%Y-%m') as month, SUM(quantity) as total")
                    ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m')"))
                    ->orderBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m')"))
                    ->get();

    $line3Data = Stock::where('status', 'verified')
                  ->selectRaw("DATE_FORMAT(created_at, '%Y-%m'), SUM(quantity) as total")
                  ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m')"))
                  ->orderBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m')"))
                  ->get();


     return view('index', compact('totalStockCount','totalVerifiedCount','totalDispatchCount','totalInstalledCount', 'Slabels', 'Sdata','Alabels','Adata','assets', 'percentageChange','AuthorizedpercentageChange','line1Data', 'line2Data', 'line3Data','totalUserCount'));
}

public function showAssets($id)

{
    // Find the asset by its AssetNo
    $asset = Stock::select('item_name', 'item_code', 'item_type')
                         ->where('id', $id)
                         ->first();

    // Check if the asset exists
    if ($asset) {
        return response()->json(['status' => 'success', 'asset' => $asset]);
    } else {
        return response()->json(['status' => 'error', 'message' => 'Asset not found'], 404);
    }
}

}

    