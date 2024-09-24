<?php

namespace App\Http\Controllers;
use App\Models\Stock;
use Illuminate\Http\Request;
use App\Models\User;


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
        $assets = Stock::select('allocation', 'item_type', 'quantity', 'status', 'damage')
            ->whereIn('status', ['verified', 'authorized'])
            ->get();

        $currentWeekUsers = User::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count();
        $lastWeekUsers = User::whereBetween('created_at', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()])->count();
        
        // Calculate the percentage change
        if ($lastWeekUsers > 0) {
            $percentageChange = (($currentWeekUsers - $lastWeekUsers) / $lastWeekUsers) * 100;
        } else {
            $percentageChange = 0; // To handle division by zero if there were no users last week
        }
            
        // Fetch stock counts for the current week
       $currentWeekStocks = Stock::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count();

       // Fetch stock counts for the previous week
       $lastWeekStocks = Stock::whereBetween('created_at', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()])->count();

      // Calculate percentage change
     if ($lastWeekStocks > 0) {
        $stockPercentageChange = (($currentWeekStocks - $lastWeekStocks) / $lastWeekStocks) * 100;
     } else {
        $stockPercentageChange = 0; // Handle division by zero if there were no stocks last week
    }

    // Assuming you have an attribute `status` to filter authorized assets
    $currentWeekVerified = Stock::where('status', 'authorized')
                                ->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
                                ->count();

    $lastWeekVerified = Stock::where('status', 'authorized')
                              ->whereBetween('created_at', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()])
                              ->count();

    // Calculate percentage change
    if ($lastWeekVerified > 0) {
        $verifiedPercentageChange = (($currentWeekVerified - $lastWeekVerified) / $lastWeekVerified) * 100;
    } else {
        $verifiedPercentageChange = 0; // Avoid division by zero
    } 
    
    // Fetch the count of dispatch assets for the current week
    $currentWeekDispatch = Stock::where('allocation', 'dispatch') // Assume 'dispatch' identifies these assets
                                ->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
                                ->count();

    // Fetch the count for the previous week
    $lastWeekDispatch = Stock::where('allocation', 'dispatch')
                              ->whereBetween('created_at', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()])
                              ->count();

    // Calculate percentage change
    if ($lastWeekDispatch > 0) {
        $dispatchPercentageChange = (($currentWeekDispatch - $lastWeekDispatch) / $lastWeekDispatch) * 100;
    } else {
        $dispatchPercentageChange = 0; // Avoid division by zero
    }

    // Fetch the count of IT installation assets for the current week
    $currentWeekInstalled = Stock::where('installation', 'yes') // Assuming 'yes' indicates installed
                                ->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
                                ->count();

    // Fetch the count for the previous week
    $lastWeekInstalled = Stock::where('installation', 'yes')
                              ->whereBetween('created_at', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()])
                              ->count();

    // Calculate the percentage change
    if ($lastWeekInstalled > 0) {
        $installedPercentageChange = (($currentWeekInstalled - $lastWeekInstalled) / $lastWeekInstalled) * 100;
    } else {
        $installedPercentageChange = 0; // Handle the case where there might be no installations the previous week
    }

    $line1Data = Stock::selectRaw('DATE(expiry_date) as date, SUM(quantity) as total')
    ->groupBy('date')
    ->orderBy('date')
    ->get();

    $line2Data = User::selectRaw('DATE(created_at) as date, COUNT(*) as total')
    ->groupBy('date')
    ->orderBy('date')
    ->get();

    $line3Data = Stock::where('status', 'verified')
                  ->selectRaw('DATE(expiry_date) as date, SUM(quantity) as total')
                  ->groupBy('date')
                  ->orderBy('date')
                  ->get();

        return view('index', compact('totalStockCount','totalVerifiedCount','totalDispatchCount','totalInstalledCount',  'totalUserCount','Slabels', 'Sdata','Alabels','Adata','assets','currentWeekUsers', 'percentageChange','currentWeekStocks', 'stockPercentageChange','currentWeekVerified', 'verifiedPercentageChange','currentWeekDispatch', 'dispatchPercentageChange','currentWeekInstalled', 'installedPercentageChange','line1Data', 'line2Data', 'line3Data'));
    }
}
