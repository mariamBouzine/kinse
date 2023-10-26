<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class offer extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['staff_id', 'service_id'];
    public function service()
    {
        return $this->belongsTo(service::class);
    }
    public function staff()
    {
        return $this->belongsTo(staff::class);
    }
}
