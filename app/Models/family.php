<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class family extends Model
{
    use HasFactory;
    protected $fillable=[
        'family_name',
        'family_email',
        'family_tel',
        'family_log'
    ];
    protected $primaryKey='family_id';
    
    protected $table='familys';
}
