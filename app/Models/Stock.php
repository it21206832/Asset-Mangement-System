<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

        // Define the table associated with the model (if it's not the plural form of the model name)
        protected $table = 'addstck'; 

        // Define the attributes that are mass assignable
        protected $fillable = [
            'item_name',
            'item_code',
            'item_type',
            'quantity',
            'price',
            'expiry_date',
            'status',
            'allocation',
            'recive',
            'installation',
            'damage',
        ];
    
        // Define the attributes that should be cast to native types
        protected $casts = [
            'expiry_date' => 'date',
        ];
}
