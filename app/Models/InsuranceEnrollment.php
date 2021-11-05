<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class InsuranceEnrollment extends Model
{

    public function ExportGroup()
    {
        return $this->belongsTo(ExportGroup::class, 'group_id');
    }


    public function Insurance()
    {
        return $this->belongsTo(Insurance::class);
    }

    public function Region()
    {
        return $this->belongsTo(Region::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Plan()
    {
        return $this->belongsTo(Plan::class, 'plan_coverage');
    }

    public function InsuranceEnrollmentHeadcount()
    {
        return $this->hasMany(InsuranceEnrollmentHeadcount::class, 'insurance_product_enrollment_id');
    }

    public function headcount()
    {
        $headCounts = $this->InsuranceEnrollmentHeadcount();
        if ($headCounts) {
            return $headCounts->count() + 1;
        }
        else {
            return 1;
        }
    }

    public function noOfDays() {
        $noOfDays = 0;
        $depart_date = new Carbon($this->depart_date);
        $return_date = new Carbon($this->return_date);
        $noOfDays = $return_date->diff($depart_date)->days;
        return $noOfDays;
    }
}
