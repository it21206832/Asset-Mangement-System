<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\User;
use App\Models\BranchTransferAsset;
use App\Models\BranchAssets;
use App\Models\Branch;
use App\Models\assets;
use App\Models\verifiedassets;
use App\Models\damagedassets;



use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class branchDashboard extends Controller
{
    public function branch()

    { 

    // Get the branch code of the logged-in user
    $branchCode = Auth::user()->BranchCode;

    
    $branchName = Auth::user()->branch->branch_name;

    // Fetch total user count
    $totalUserCount = User::where('BranchCode', $branchCode)->where('userType', 'Branch')->count();

     // Fetch total stock count for all items
     $totalStockCount = branch::where('BranchCode', $branchCode)->sum('stocks'); // Assuming 'quantity' is the stock field


     // Fetch total count of  assets
     $totalAseetCount = branch::where('BranchCode', $branchCode)->sum('assets'); 

     // Fetch total count of verified assets
     $totalVerifiedCount = branch::where('BranchCode', $branchCode)->sum('verifyAssets'); 


     // Fetch total count of assets installation(IT)
     $totalInstalledCount = branch::where('BranchCode', $branchCode)->sum('installedAssets'); 


     // Fetch assets  data for the previous month
     $previousMonth = Carbon::now()->subMonth();
     $lastMonthStockCount = Branch::whereMonth('created_at', $previousMonth->month)
                                 ->whereYear('created_at', $previousMonth->year)
                                 ->sum('assets');

     // Fetch assets data for the current month (which you can consider as the "next" month in your scenario)
     $nextMonth = Carbon::now(); // Alternatively, adjust as per your "next month" definition
     $nextMonthStockCount = Branch::whereMonth('created_at', $nextMonth->month)
                                 ->whereYear('created_at', $nextMonth->year)
                                 ->sum('assets');
     // Calculate percentage increase or decrease
     if ($lastMonthStockCount > 0) {
         $percentageChange = (($nextMonthStockCount - $lastMonthStockCount) / $lastMonthStockCount) * 100;
     } else {
         $percentageChange = 0; // Avoid division by zero if no stock last month
     }

     // Fetch  total count of stocks data for the previous month
     $previousMonth = Carbon::now()->subMonth();
     $lastMonthAuthorizedStockCount = Branch::whereMonth('created_at', $previousMonth->month)
                                 ->whereYear('created_at', $previousMonth->year)
                                 ->sum('stocks');

     // Fetch total count of stocks data for the current month (which you can consider as the "next" month in your scenario)
     $nextMonth = Carbon::now(); // Alternatively, adjust as per your "next month" definition
     $nextMonthAuthorizedStockCount = Branch::whereMonth('created_at', $nextMonth->month)
                                 ->whereYear('created_at', $nextMonth->year)
                                 ->sum('stocks');

     // Calculate percentage increase or decrease
     if ($lastMonthAuthorizedStockCount > 0) {
         $AuthorizedpercentageChange = (($nextMonthAuthorizedStockCount - $lastMonthAuthorizedStockCount) / $lastMonthAuthorizedStockCount) * 100;
     } else {
         $AuthorizedpercentageChange = 0; // Avoid division by zero if no stock last month
     }

    // Get the logged-in user's branch code
    $branchCode = Auth::user()->BranchCode;

   // Fetch the total quantities for each category in the BranchAssets table, filtered by BranchNo
    $BranchAssetsData = assets::select([
        DB::raw('SUM(Machinery) as machinery_quantity'),
        DB::raw('SUM(Furniture) as furniture_quantity'),
        DB::raw('SUM(Computer) as computer_quantity'),
        DB::raw('SUM(Vehicle) as vehicle_quantity'),
        DB::raw('SUM(`Fire_Alarm`) as fire_alarm_quantity')
    ])
    ->where('BranchNo', $branchCode) // Filter by the logged-in user's branch code
    ->first(); // Get a single result

    // Prepare labels and data for the pie chart
    $Slabels = ['Machinery', 'Furniture', 'Computer', 'Vehicle', 'Fire Alarm'];
    $Sdata = [
    $BranchAssetsData->machinery_quantity,
    $BranchAssetsData->furniture_quantity,
    $BranchAssetsData->computer_quantity,
    $BranchAssetsData->vehicle_quantity,
    $BranchAssetsData->fire_alarm_quantity
    ];


    // Fetch asset types and their quantities-asset pie chart, filtered by BranchCode
    $assetData = BranchAssets::selectRaw('UsageOfAssets, SUM(Quantity) as asset_quantity')
                            ->where('BranchNo', $branchCode) // Filter by logged-in user's branch code
                            ->groupBy('UsageOfAssets')
                            ->get();



    // Prepare asset types and their quantities-asset pie chart
    $Alabels = $assetData->pluck('UsageOfAssets'); 
    $Adata = $assetData->pluck('asset_quantity'); 

    $branchCode = Auth::user()->BranchCode;

    // 1. Get  Verified Asset Quantities 
    $assetsByCategory = verifiedassets::select(
        verifiedassets::raw('SUM(Machinery) as total_machinery'),
        verifiedassets::raw('SUM(Furniture) as total_furniture'),
        verifiedassets::raw('SUM(Computer) as total_computer'),
        verifiedassets::raw('SUM(Vehicle) as total_vehicle'),
        verifiedassets::raw('SUM(Fire_Alarm) as total_fire_alarm')
    )
    ->where('BranchNo', $branchCode) 
    ->first(); 
    $verifiedcategories = ['Machinery', 'Furniture', 'Computer', 'Vehicle', 'Fire Alarm'];
    $quantitiesByCategory = [
        $assetsByCategory->total_machinery,
        $assetsByCategory->total_furniture,
        $assetsByCategory->total_computer,
        $assetsByCategory->total_vehicle,
        $assetsByCategory->total_fire_alarm,
    ];

    // 2. Get Damage Assets by Category
    $damageAssetsByCategory = damagedassets::select(
        damagedassets::raw('SUM(Machinery) as total_machinery'),
        damagedassets::raw('SUM(Furniture) as total_furniture'),
        damagedassets::raw('SUM(Computer) as total_computer'),
        damagedassets::raw('SUM(Vehicle) as total_vehicle'),
        damagedassets::raw('SUM(Fire_Alarm) as total_fire_alarm')
    )
    ->where('BranchNo', $branchCode) 
    ->first(); 
    $damagecategories = ['Machinery', 'Furniture', 'Computer', 'Vehicle', 'Fire Alarm'];
    $damagequantities = [
        $damageAssetsByCategory->total_machinery,
        $damageAssetsByCategory->total_furniture,
        $damageAssetsByCategory->total_computer,
        $damageAssetsByCategory->total_vehicle,
        $damageAssetsByCategory->total_fire_alarm,
    ];
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

    // Fetch all assets with their details, filtered by the logged-in user's branch code
    $assets = BranchAssets::select('BranchNo', 'AssetNo','ReceiveStatus', 'Action')
    ->where('BranchNo', $branchCode)  // Filter by the logged-in user's branch code
    ->whereIn('ReceiveStatus', ['Pending', 'Received','Not Received'])  // Filter by status
    ->get();

    $line1Data = BranchAssets::selectRaw('DATE(PurchaseDate) as date, SUM(Quantity) as total')
    ->where('BranchNo', $branchCode) // Filter by the logged-in user's branch code
    ->groupBy('date')
    ->orderBy('date')
    ->get();

    // Line 2 Data: Count of assets per category over time
    $line2Data = BranchAssets::selectRaw('DATE(PurchaseDate) as date,ReceiveStatus, SUM(Quantity) as total')
    ->where('BranchNo', $branchCode) // Filter by the logged-in user's branch code
    ->whereIn('ReceiveStatus', ['Pending', 'Not Received'])
    ->groupBy('date','ReceiveStatus')   
    ->orderBy('date')
    ->get();

    // Line 3 Data: Count of assets per class over time
    $line3Data = BranchAssets::selectRaw('DATE(PurchaseDate) as date, Action, SUM(Quantity) as total')
    ->where('BranchNo', $branchCode) // Filter by the logged-in user's branch code
    ->whereIn('Action', [ 'Unverified'])
    ->groupBy('date','Action')  
    ->orderBy('date')
    ->get();


   return view('branch', compact('totalUserCount','totalStockCount','totalVerifiedCount','totalAseetCount','totalInstalledCount','damagequantities','damagecategories','assetValueOverTime', 'assetAllocationTrends', 'branchName','percentageChange','assets','Slabels','Sdata','Alabels','Adata','verifiedcategories','quantitiesByCategory','line1Data','line2Data','line3Data'));
}


public function verify($assetNo)
{
    // Find the asset by its AssetNo
    $asset = BranchAssets::where('AssetNo', $assetNo)->first();

    if ($asset) {
        if ($asset->ReceiveStatus === 'Not Received') {
            $asset->ReceiveStatus = 'Received';
            $asset->save();
        }
    }

    
    return redirect()->back()->with('success', 'Asset Received successfully.');
}

public function showAssets($assetNo)

{
    // Find the asset by its AssetNo
    $asset = BranchAssets::select('AssetNo', 'AssetCategory', 'AssetClass', 'Brand', 'Model', 'SerialNumber', 'PurchaseDate', 'ProcurementDate')
                         ->where('AssetNo', $assetNo)
                         ->first();

                         

    // Check if the asset exists
    if ($asset) {
        return response()->json(['status' => 'success', 'asset' => $asset]); 
    } else {
        return response()->json(['status' => 'error', 'message' => 'Asset not found'], 404);
    }
}


}