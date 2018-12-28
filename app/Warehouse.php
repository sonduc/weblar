<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $table = "warehouses";
    protected $fillable = [
        'prodcut_id','admin_id','quantity_original'
    ];
}
