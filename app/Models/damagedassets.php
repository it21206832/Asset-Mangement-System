<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class damagedassets extends Model
{
    use HasFactory;
    protected $table = 'damagedassets'; // Specify the table name if it doesn't follow Laravel's naming convention

    protected $fillable = [
        'BranchNo',
        'Machinery',
        'Furniture',
        'Computer',
        'Vehicle',
        'Fire_Alarm',
    ];
}
