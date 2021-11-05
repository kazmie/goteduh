<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Package extends Model
{
    public function Insurance()
    {
        return $this->belongsTo(Insurance::class);
    }

    public function Region()
    {
        return $this->belongsTo(Region::class);
    }

    public function Plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function Country() {
        return $this->belongsToMany(Country::class, 'country_package');
    }

    public function CategoryPlan() {
        return $this->belongsTo(CategoryPlan::class);
    }
}
