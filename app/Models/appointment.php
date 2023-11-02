<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appointment extends Model
{
    use HasFactory;
    protected $fillable = ['offer_ID','Patient_ID','Cost'];
    public function offer()
    {
        return $this->belongsTo(offer::class, 'offer_ID');
    }
    public function Patient()
    {
        return $this->belongsTo(patient::class, 'Patient_ID');
    }
    public function Appointmentscoach()
    {
        return $this->hasMany(Appointmentscoach::class);
    }
}
