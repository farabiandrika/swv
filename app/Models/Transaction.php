<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total',
        'status',
        'resi',
        'ekspedisi',
        'address',
        'bukti_bayar',
    ];

    public function carts() {
        return $this->hasMany('App\Models\Cart')->with('catalogue');
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
