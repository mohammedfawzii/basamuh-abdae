<?php

namespace Modules\Settings\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Settings\Database\factories\SettingsFactory;

class settings extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'address',
        'phone',
        'facebook',
        'twitter',
        'email',
    ];

    protected static function newFactory(): SettingsFactory
    {
        //return SettingsFactory::new();
    }
}
