<?php

namespace Modules\Patients\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Booking\App\Models\Booking;
use Modules\Parint\App\Models\Parint;


class Patient extends Model
{
    use HasFactory;

    protected $table = 'patients';
    protected $fillable = [
        'name',
        'age',
        'sex_status',
        'parint_id'
    ];

    public function booking(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Booking::class, 'patient_id');
    }

    public function parint(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Parint::class, 'parint_id');
    }
}
