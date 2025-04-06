<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $table = 'locations';

    protected $fillable = [
        'nama_lokasi',
    ];

    public function onDutyRosters()
    {
        return $this->hasMany(OnDutyRoster::class, 'location_id');
    }
}
