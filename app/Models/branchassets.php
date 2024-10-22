<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchAssets extends Model
{
    use HasFactory;

    protected $table = 'branchassets';

    protected $fillable = [
        'BranchNo',
        'AssetNo',
        'Branch',
        'ReleaseTo',
        'UsageOfAssets',
        'Quantity',
        'ReceiveStatus',
        'Action',
        'AssetCategory',
        'AssetClass',
        'Brand',
        'Model',
        'SerialNumber',
        'PurchaseDate',
        'ProcurementDate',
    ];

    protected $casts = [
        'PurchaseDate' => 'date',
        'ProcurementDate' => 'date',
    ];
}
