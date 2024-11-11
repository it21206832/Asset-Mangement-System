<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class unverifiedassets extends Model
{
    use HasFactory;
    protected $table = 'unverifiedassets'; // Specify the table name if it doesn't follow Laravel's naming convention

    protected $fillable = [
        'BranchNo',
        'Machinery',
        'Furniture',
        'Computer',
        'Vehicle',
        'Fire_Alarm',
    ];
}
