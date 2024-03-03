<?php

namespace Modules\Package\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

//use Modules\Package\Database\factories\PackageFactory;
use Modules\Booking\App\Models\Booking;
use Modules\TreatmentSession\App\Models\TreatmentSession;

class Package extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'session_id',
        'quantities',
        'total_price'
    ];

    public function treatmentSessions(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(TreatmentSession::class, 'package_treatment_session')
            ->withPivot('quantity')
            ->withTimestamps();
    }

    public function booking(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Booking::class, 'package_id');
    }

}
