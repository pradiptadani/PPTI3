<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_stock_opname extends Model
{
    protected $table = 'detail_stock_opname';
    protected $casts = [
        'idStock_Opname' => 'integer',
        'id_item' => 'integer',
        'stock_akhir' => 'integer',
        'updated_at' => 'datetime',
    ];
    protected $fillable = ['idStock_Opname', 'id_item', 'quantity', 'updated_at'];
    protected $foreignKey = ['idStock_Opname', 'id_item'];

    use HasFactory;

    public function stock_opname()
    {
        return $this->belongsTo(stock_opname::class, 'idStock_Opname', 'idStock_Opname');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'id_item', 'id_item');
    }
}
