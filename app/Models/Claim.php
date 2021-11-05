<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    public function InsuranceEnrollment()
    {
        return $this->belongsTo(InsuranceEnrollment::class);
    }

    public function ClaimType()
    {
        return $this->belongsTo(ClaimType::class);
    }

    public function ClaimDocuments() {
        return $this->hasMany(ClaimDocument::class);
    }
}
