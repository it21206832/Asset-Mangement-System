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

  

    protected $primaryKey = 'AssetNo'; // Specify the actual primary key

    public $incrementing = false; // If AssetNo is not an auto-incrementing integer

    protected $keyType = 'string'; // If AssetNo is not an integer 
    
    public $timestamps = false; // Disable timestamps

    protected $casts = [
        'PurchaseDate' => 'date',
        'ProcurementDate' => 'date',
    ];
}
