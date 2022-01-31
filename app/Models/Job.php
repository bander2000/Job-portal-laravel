<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    public function catogry()
    {
        return $this->belongsTo(Catogry::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function applay()
    {
        return $this->hasMany(Applay::class);
    }
}
