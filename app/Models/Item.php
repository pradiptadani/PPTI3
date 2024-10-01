<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'item';
    protected $casts = [
        'id_item' => 'integer',
        'item_name' => 'string',
        'specification' => 'string',
        'category' => 'string',
        'unit' => 'string',
        'price' => 'integer',
        'quantity' => 'integer',
        'updated_at' => 'datetime',
    ];
    protected $fillable = ['id_item', 'item_name', 'specification', 'category', 'unit', 'price', 'quantity', 'updated_at'];
    protected $primaryKey = 'id_item';
    use HasFactory;

    public function detail_stock_opname()
    {
        return $this->hasMany(detail_stock_opname::class, 'id_item', 'id_item');
    }
}
