<?php

namespace Modules\TreatmentSession\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Doctor\App\Models\Doctor;
use Modules\MedicalSpecialtys\App\Models\MedicalSpecialty;
use Modules\Package\App\Models\Package;
class TreatmentSession extends Model
{
    use HasFactory;


    protected $fillable = [
        'price',
        'type',
        'medical_specialty_id',
        'doctor_id',
    ];

    public function medical(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(MedicalSpecialty::class, 'medical_specialty_id');
    }

    public function doctor(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    public function package(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Package::class, '')->withPivot('quantity');
    }
}
