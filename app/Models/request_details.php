<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class request_details extends Model
{
    protected $table = 'request_details';
    protected $casts = [
        'id_request_item' => 'integer',
        'id_item' => 'integer',
        'number_of_request' => 'float',
    ];
    protected $fillable = ['id_request_item', 'id_item', 'number_of_request'];
    protected $foreignKey = ['id_request_item', 'id_item'];
    
    use HasFactory;

    public function demand_for_item()
    {
        return $this->belongsTo(demand_for_item::class, 'id_request_item', 'id_request_item');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'id_item', 'id_item');
    }
}
