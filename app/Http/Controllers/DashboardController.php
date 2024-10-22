<?php

namespace App\Http\Controllers;
use App\Models\Stock;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BranchAssets;
use App\Models\BranchTransferAsset;
use App\Models\BranchAssetList;

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
        $BranchAssetsData = BranchAssets::select('AssetCategory', Stock::raw('SUM(Quantity) as total_quantity'))
                            ->groupBy('AssetCategory')
                            ->get();
         // Fetch asset types and their quantities-asset pie chart
        $assetData = BranchAssets::selectRaw('UsageOfAssets, SUM(Quantity) as asset_quantity')
                            ->groupBy('UsageOfAssets')
                            ->get();
       
        // Prepare data for stock pie chart
        $Slabels = $BranchAssetsData->pluck('AssetCategory'); // Asset types
        $Sdata = $BranchAssetsData->pluck('total_quantity'); // Corresponding quantities

        // Prepare data for stock asset chart
        $Alabels = $assetData->pluck('UsageOfAssets'); // Asset types
        $Adata = $assetData->pluck('asset_quantity'); // Corresponding quantities

        // 1. Get Asset Quantities by Branch
        $assetsByBranch = BranchAssets::select('Branch', BranchAssets::raw('SUM(Quantity) as total_quantity'))
        ->groupBy('Branch')
        ->get();
    
        $branches = $assetsByBranch->pluck('Branch');
        $quantitiesByBranch = $assetsByBranch->pluck('total_quantity');
    
        // 2. Get Stock Levels by Category
        $stockLevelsByCategory = BranchAssets::select('AssetCategory', BranchAssets::raw('SUM(Quantity) as total_quantity'))
        ->groupBy('AssetCategory')
        ->get();
    
        $categories = $stockLevelsByCategory->pluck('AssetCategory');
        $quantitiesByCategory = $stockLevelsByCategory->pluck('total_quantity');
    
         // New Code for "Asset Value Over Time" using straight-line depreciation (10% per year)
         $depreciationRate = 0.1; // Adjust rate as needed
         $initialValue = 1000; // Example initial asset value, adjust as needed
 
         $assetValueOverTime = BranchAssets::selectRaw(
             'DATE(ProcurementDate) as date,
             SUM(Quantity * IFNULL(
                 ? * POW(1 - ?, DATEDIFF(CURDATE(), ProcurementDate) / 365), 
                 0)) as total_value', [$initialValue, $depreciationRate]
         )
         ->groupBy('date')
         ->orderBy('date')
         ->get();
 
         // Prepare data for the "Trends in Asset Allocation" line chart
         $assetAllocationTrends = BranchAssets::selectRaw(
             'DATE(ProcurementDate) as date, 
             AssetCategory, 
             SUM(Quantity) as total_quantity'
         )
         ->groupBy('date', 'AssetCategory')
         ->orderBy('date')
         ->get();

        // Fetch all assets with their details
        $assets = BranchAssets::select('BranchNo', 'AssetNo', 'Branch', 'ReleaseTo', 'ReceiveStatus', 'Action')
            ->whereIn('ReceiveStatus', ['Pending', 'Received'])
            ->get();

    $line1Data = BranchAssets::selectRaw('DATE(PurchaseDate) as date, SUM(Quantity) as total')
    ->groupBy('date')
    ->orderBy('date')
    ->get();

// Line 2 Data: Count of assets per category over time
   $line2Data = BranchAssets::selectRaw('DATE(PurchaseDate) as date, AssetCategory, COUNT(*) as total')
    ->groupBy('date', 'AssetCategory')
    ->orderBy('date')
    ->get();

// Line 3 Data: Count of assets per class over time
  $line3Data = BranchAssets::selectRaw('DATE(PurchaseDate) as date, AssetClass, COUNT(*) as total')
    ->groupBy('date', 'AssetClass')
    ->orderBy('date')
    ->get();


        return view('index', compact('totalStockCount','totalVerifiedCount','totalDispatchCount','totalInstalledCount',  'totalUserCount','Slabels', 'Sdata','Alabels','Adata','assets','line1Data', 'line2Data', 'line3Data','branches','quantitiesByBranch','categories','quantitiesByCategory','assetValueOverTime', 'assetAllocationTrends'));
    }
}
