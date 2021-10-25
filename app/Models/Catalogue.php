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
    ];

    public function carts() {
        return $this->hasMany('App\Models\Cart');
    }
}
