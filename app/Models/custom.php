<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class custom extends Model
{
    use HasFactory;
    protected $fillable=[
        'custom_name',
        'custom_email',
        'custom_address',
        'custom_tel',
        'custom_log'
    ];
    protected $primaryKey='custom_id';
}
