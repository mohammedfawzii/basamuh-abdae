<?php

namespace Modules\Prescriptions\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Prescriptions\Database\factories\PrescriptionsFactory;

class prescriptions extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    
    protected static function newFactory(): PrescriptionsFactory
    {
        //return PrescriptionsFactory::new();
    }
}
