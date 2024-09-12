<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

        
        protected $table = 'addstck'; 

        
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
    
        protected $casts = [
            'expiry_date' => 'date',
        ];
}
