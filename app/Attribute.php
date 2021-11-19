<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attribute extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'sku_id', 'attribute', 'value'
    ];

    protected $hidden = [
        'deleted_at', 'created_at', 'updated_at',
    ];

    public function Sku()
    {
        return $this->belongsTo(Sku::class);
    }
}
