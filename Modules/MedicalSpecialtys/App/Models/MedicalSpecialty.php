<?php

namespace Modules\MedicalSpecialtys\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Assestents\App\Models\Assestent;
use Modules\Doctor\App\Models\Doctor;
use Modules\Employees\App\Models\Employe;
//use Modules\MedicalSpecialtys\Database\factories\MedicalSpecialtyFactory;

class MedicalSpecialty extends Model
{

    use HasFactory;


    protected $table = 'medical_specialties';
    protected $fillable = ['name'];

    public function Doctor(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Doctor::class, 'medical_specialty_id');
    }

    public function Assestent(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Assestent::class, 'medical_specialty_id');
    }

    public function Employe(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Employe::class, 'medical_specialty_id');
    }
}

