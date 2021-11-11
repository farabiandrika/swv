<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'catalogue_id',
        'user_id',
        'quantity',
        'status',
        'transaction_id',
        'keterangan',
    ];

    public function catalogue() {
        return $this->belongsTo('App\Models\Catalogue')->where('isActive', 1);
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function transaction() {
        return $this->belongsTo('App\Models\Transaction');
    }
}
