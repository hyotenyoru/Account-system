<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderlist extends Model
{
    use HasFactory;
    protected $fillable=[
        'family_name',
        'orderlist_log'
    ];
    protected $primaryKey='orderlist_id';

    protected $table='orderlists';

}
