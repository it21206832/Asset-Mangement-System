<?php
namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\User;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class branchDashboard extends Controller
{
    public function branch()
    {
        // Get the branch code of the logged-in user
    $branchCode = Auth::user()->BranchCode;

    $branchName = Auth::user()->branch->branch_name;

     // Fetch total stock count for all items
     $totalStockCount = Stock::where('code', $branchCode)->sum('quantity');

     // Fetch total count of assets with status 'verified' or 'authorized'
     $totalVerifiedCount = Stock::where('code', $branchCode)->whereIn('status', ['verified', 'authorized'])->sum('quantity');

     // Fetch total count of assets allocation except for 'None'
     $totalDispatchCount = Stock::where('code', $branchCode)->where('allocation', '!=', 'None')->sum('quantity');

     // Fetch total count of assets installation(IT)
     $totalInstalledCount = Stock::where('code', $branchCode)->whereIn('installation', ['yes'])->sum('quantity');


     // Fetch  stck data for the previous month
     $previousMonth = Carbon::now()->subMonth();
     $lastMonthStockCount = Stock::where('code', $branchCode)->whereMonth('created_at', $previousMonth->month)
                                 ->whereYear('created_at', $previousMonth->year)
                                 ->sum('quantity');

     // Fetch stck data for the current month (which you can consider as the "next" month in your scenario)
     $nextMonth = Carbon::now(); // Alternatively, adjust as per your "next month" definition
     $nextMonthStockCount = Stock::where('code', $branchCode)->whereMonth('created_at', $nextMonth->month)
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

     // Fetch asset types and their quantities-stock pie chart
     $stockData = Stock::where('code', $branchCode)->select('item_type', Stock::raw('SUM(quantity) as total_quantity'))
                         ->groupBy('item_type')
                         ->get();

     // Fetch asset types and their quantities-asset pie chart
     $assetData = Stock::where('code', $branchCode)->selectRaw('item_type, SUM(quantity) as asset_quantity')
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
     $assets = Stock::select('allocation', 'item_type', 'quantity', 'status', 'damage')
         ->whereIn('status', ['verified', 'authorized'])
         ->get();

     return view('branch', compact('totalStockCount','totalVerifiedCount','totalDispatchCount','totalInstalledCount', 'Slabels', 'Sdata','Alabels','Adata','assets', 'percentageChange','AuthorizedpercentageChange','branchName'));


}

}