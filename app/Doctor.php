<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    public function hospitals()
    {
        return $this->belongsToMany(Hospital::class);
    }
}
