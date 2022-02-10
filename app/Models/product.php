<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable=[
        'product_name',
        'product_money',
        'product_log',
    ];
    protected $primaryKey='product_id';

    protected $table="products";
}
