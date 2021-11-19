<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bike extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'category_id', 'sku_id', 'status'
    ];

    protected $hidden = [
        'deleted_at', 'created_at', 'updated_at',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
