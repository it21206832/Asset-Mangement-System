<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchTransferAsset extends Model
{
    use HasFactory;

    protected $table = 'branchtransferasset';

    protected $fillable = [
        'BranchNo',
        'AssetNo',
        'Branch',
        'ReleaseTo',
        'UsageOfAssets',
        'Quantity',
        'CurrentBranch',
        'TransitDestination',
        'DestinationBranch',
    ];
}
