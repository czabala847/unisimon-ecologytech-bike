<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bike extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'sku_id', 'status'
    ];

    protected $hidden = [
        'deleted_at', 'created_at', 'updated_at',
    ];
}
