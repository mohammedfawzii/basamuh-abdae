<?php

namespace Modules\Parint\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Parint extends Model
{
    use HasFactory;
    protected  $table='parints';
    protected $fillable = [
        'name',
        'address',
        'phone',
        'job',
        'age',
    ];
}
