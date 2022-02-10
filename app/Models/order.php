<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $fillable=[
        'order_name',
        'plan_id',
        'order_log'
    ];
    protected $primaryKey='order_id';
    
    protected $table='orders';
}
