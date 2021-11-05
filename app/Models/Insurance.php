<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    public function Company()
       {
           return $this->belongsTo(Company::class);
       }

    public function InsuranceProductBenefit()
    {
           return $this->hasMany(InsuranceProductBenefit::class);
    }

    public function InsuranceBenefitType()
    {
        return $this->belongsTo(InsuranceBenefitType::class);
    }

}
