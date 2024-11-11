<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class verifiedassets extends Model
{
    use HasFactory;
    protected $table = 'verifiedassets'; 

    protected $fillable = [
        'BranchNo',
        'Machinery',
        'Furniture',
        'Computer',
        'Vehicle',
        'Fire_Alarm',
    ];
}
