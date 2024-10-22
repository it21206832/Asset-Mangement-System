<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchAssetList extends Model
{
    use HasFactory;

    protected $table = 'branchassetlist';

    protected $fillable = [
        'BranchNo',
        'AssetNo',
        'Branch',
        'ReleaseTo',
        'UsageOfAssets',
        'Quantity',
        'CurrentValue',
        'Received',
    ];
}
