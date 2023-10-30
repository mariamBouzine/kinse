<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appointment extends Model
{
    use HasFactory;
    protected $fillable = ['Offer_id','Name','Cost'];
    public function offer()
    {
        return $this->belongsTo(offer::class, 'Offer_id');
    }
    
}
