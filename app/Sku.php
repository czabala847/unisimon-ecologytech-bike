<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sku extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'category_id', 'sku', 'name', 'price', 'quantity', 'image'
    ];

    protected $hidden = [
        'deleted_at', 'created_at', 'updated_at',
    ];

    public function attributes()
    {
        return $this->hasMany(Attribute::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function bikes()
    {
        return $this->hasMany(Bike::class);
    }
}
