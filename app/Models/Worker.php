<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'photo',
        'role',
    ];

    /**
     * Relasi ke OnDutyRoster.
     */
    public function onDutyRosters()
    {
        return $this->hasMany(OnDutyRoster::class);
    }
}
