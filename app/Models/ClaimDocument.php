<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClaimDocument extends Model
{
    public function ClaimDocumentType() {
        return $this->belongsTo(ClaimDocumentType::class);
    }

    public function Claim() {
        return $this->belongsTo(Claim::class);
    }
}
