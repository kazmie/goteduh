<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class InsuranceBenefitType extends Model
{
    public function CategoryPlan() {
        return $this->belongsTo(CategoryPlan::class);
    }
}
