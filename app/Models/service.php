<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class service extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $timestamps = false;
    public function offer()
    {
        return $this->hasMany(offer::class);
    }
}
