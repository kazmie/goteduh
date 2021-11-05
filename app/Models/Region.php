<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Region extends Model
{
    public function Country() {
        return $this->belongsToMany(Country::class, 'country_region');
    }
}
