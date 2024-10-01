<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\request_details;
class demand_for_item extends Model
{
    protected $table = 'demand_for_item';
    protected $casts = [
        'id_request_item' => 'integer',
        'request_date' => 'string',
        'application_status' => 'string',
        'id_user' => 'integer',
    ];
    protected $fillable = ['id_request_item', 'request_date', 'application_status', 'id_user'];
    protected $primaryKey = 'id_request_item';
    protected $foreignKey = 'id_user';  
    
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');

    }

    public function request_details()
    {
        return $this->hasMany(request_details::class, 'id_request_item', 'id_request_item');
    }
}
