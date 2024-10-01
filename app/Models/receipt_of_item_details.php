<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class receipt_of_item_details extends Model
{
    protected $table = 'receipt_of_item_details';
    protected $fillable = [
        'id_item',
        'id_receipt_of_item',
        'amount_of_item'
    ];
    
    use HasFactory;
}
