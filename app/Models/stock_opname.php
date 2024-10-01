<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stock_opname extends Model
{
    protected $table = 'stock_opname';
    protected $casts = [
        'idStock_Opname' => 'integer',
        'report_date' => 'date',
        'id_user' => 'integer',
    ];
    protected $fillable = ['idStock_Opname', 'report_date', 'id_user'];
    protected $primaryKey = 'idStock_Opname';
    protected $foreignKey = 'id_user';

    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
