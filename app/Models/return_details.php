<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class return_details extends Model
{
    protected $table = 'return_details';
    protected $primaryKey = 'id_return_item';
    protected $fillable = [
        'id_return_item',
        'id_return',
        'id_item',
        'quantity',
        'status',
        'created_at',
        'updated_at'
    ];
    use HasFactory;
}
