<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'description', 'status'
    ];

    protected $hidden = [
        'deleted_at', 'created_at', 'updated_at',
    ];
}
