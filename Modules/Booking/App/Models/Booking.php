<?php

namespace Modules\Booking\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Package\App\Models\Package;
use Modules\Patients\App\Models\Patient;

class Booking extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'package_id',
        'patient_id',
        'package_price',
        'paid',
        'rest'

    ];


    public function  package(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Package::class,'package_id');
    }
    public function  patient(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Patient::class,'patient_id');
    }

}
