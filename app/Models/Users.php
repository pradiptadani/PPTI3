<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\demand_for_item;
class Users extends Model
{
    protected $table = 'user';
    public function demands()
    {
        return $this->hasMany(demand_for_item::class, 'id_user', 'id_user');
    }
    public function stock_opnames()
    {
        return $this->hasMany(stock_opname::class, 'id_user', 'id_user');
    }
    use HasFactory;
}
