<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalogue extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'size',
        'stock',
        'description',
        'gender',
        'category_id',
        'price',
        'isActive',
        'slug',
    ];

    public function carts() {
        return $this->hasMany('App\Models\Cart');
    }

    public function category() {
        return $this->belongsTo('App\Models\Category');
    }

    public function images() {
        return $this->hasMany('App\Models\CatalogueImages');
    }
}
