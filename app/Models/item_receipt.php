<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item_receipt extends Model
{
    protected $table = 'items_receipt';
    protected $primaryKey = 'id_receipt_of_item';
    protected $foreignKey = 'id_supplier';
    protected $fillable = [
        'id_receipt_of_item',
        'receipt_date'
    ];


    use HasFactory;
}
