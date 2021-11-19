<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sku extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'sku', 'name', 'price', 'quantity'
    ];

    protected $hidden = [
        'deleted_at', 'created_at', 'updated_at',
    ];

    public function attributes()
    {
        return $this->hasMany(Attribute::class);
    }
}
