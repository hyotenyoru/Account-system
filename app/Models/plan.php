<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plan extends Model
{
    use HasFactory;
    protected $fillable = [
        'plan_name',
        'plan_state',
        'plan_log',
    ];
    protected $primaryKey = 'plan_id';
}
