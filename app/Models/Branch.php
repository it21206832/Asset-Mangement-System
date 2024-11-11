<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'BranchCode',
        'branch_name',
        'stocks',
        'assets',
        'verifyAssets',
        'unVerifyAssets',
        'installedAssets',
        'damageAssets',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'BranchCode', 'BranchCode');
    }
}








