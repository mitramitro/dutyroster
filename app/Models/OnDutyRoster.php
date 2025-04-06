<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnDutyRoster extends Model
{
    use HasFactory;

    protected $table = 'on_duty_rosters';

    protected $fillable = [
        'tanggal',
        'location_id',
        'manager_on_duty_id',
        'hsse_id',
        'mps_id',
        'ssga_qq_id',
        'rsd_fuel_pagi_id',
        'rsd_fuel_sore_id',
        'rsd_lpg_pagi_id',
        'rsd_lpg_sore_id',
        'publish'
    ];

    // protected $casts = [
    //     'tanggal' => 'date',
    // ];

    // Relasi ke lokasi
    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    // Relasi ke employees untuk masing-masing peran
    public function managerOnDuty()
    {
        return $this->belongsTo(Employee::class, 'manager_on_duty_id');
    }

    public function hsse()
    {
        return $this->belongsTo(Employee::class, 'hsse_id');
    }

    public function mps()
    {
        return $this->belongsTo(Employee::class, 'mps_id');
    }

    public function ssgaQq()
    {
        return $this->belongsTo(Employee::class, 'ssga_qq_id');
    }

    public function rsdFuelPagi()
    {
        return $this->belongsTo(Employee::class, 'rsd_fuel_pagi_id');
    }

    public function rsdFuelSore()
    {
        return $this->belongsTo(Employee::class, 'rsd_fuel_sore_id');
    }

    public function rsdLpgPagi()
    {
        return $this->belongsTo(Employee::class, 'rsd_lpg_pagi_id');
    }

    public function rsdLpgSore()
    {
        return $this->belongsTo(Employee::class, 'rsd_lpg_sore_id');
    }
}
