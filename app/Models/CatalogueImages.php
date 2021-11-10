<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogueImages extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'catalogue_id',
    ];
    
    public function catalogue() {
        return $this->belongsTo('App\Models\Catalogue');
    }
}
