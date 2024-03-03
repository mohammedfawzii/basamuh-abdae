<?php

namespace Modules\Employees\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\MedicalSpecialtys\App\Models\MedicalSpecialty;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Employe extends Model implements HasMedia
{
    use HasFactory ,InteractsWithMedia;
    protected $fillable = [
        'name',
        'phone',
        'emile',
        'military_service_status',
        'qualification',
        'nationalityID',
        'qualification_degree',
        'qualification',
        'sex_status',
        'marital_status',
        'age',
        'address',
        'email',
        'medical_specialty_id',
    ];
    public  function MedicalSpecialty(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(MedicalSpecialty::class,'medical_specialty_id');
    }
}
