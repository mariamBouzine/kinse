<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class appointmentscoach extends Model
{
    protected $table = 'appointmentscoach'; 
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['coach_id','appointment_id'];
    public function staff()
    {
        return $this->belongsTo(staff::class);
    }
    public function appointments()
    {
        return $this->belongsTo(appointment::class);
    }
}
