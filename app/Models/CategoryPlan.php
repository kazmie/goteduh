<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class CategoryPlan extends Model
{
    protected $guarded = [];
    public function Packages() {
        return $this->belongsToMany(Package::class, 'category_plans');
    }
}
