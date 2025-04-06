<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = [
        'nama',
        'jabatan',
        'fungsi',
        'location_id',
        'nohp',
        'photo',
    ];

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
}
