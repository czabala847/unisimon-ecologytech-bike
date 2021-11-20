<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RentalPricing extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'category_id', 'price', 'description'
    ];

    protected $hidden = [
        'deleted_at', 'created_at', 'updated_at',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
