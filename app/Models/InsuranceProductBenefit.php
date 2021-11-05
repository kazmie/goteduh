<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class InsuranceProductBenefit extends Model
{
    public function InsuranceBenefitType()
    {
        return $this->belongsTo(InsuranceBenefitType::class);
    }

    public function CategoryPlan() {
        return $this->belongsTo(CategoryPlan::class);
    }

    public function Plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
