<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function Packages() {
        return $this->belongsToMany(Package::class, 'country_package');
    }

    public function Region() {
        return $this->belongsToMany(Region::class, 'country_region');
    }

}
