<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class offer extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['Name', 'service_id', 'staff_id', 'Class_Schedule', 'Cost', 'Class_Type', 'Description', 'Duration_Type'];
    public function service()
    {
        return $this->belongsTo(service::class);
    }
    public function staff()
    {
        return $this->belongsTo(staff::class);
    }
    public function appointment()
    {
        return $this->hasMany(appointment::class);
    }
}
