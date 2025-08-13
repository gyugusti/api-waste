<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'laporan';
    protected $primaryKey = 'lap_id';
    public $timestamps = false;
    protected $fillable = [
        'fas_id', 'per_awal', 'per_akhir', 'jenis_lap_id', 'jenis_limbah_id'
    ];

    public function fasilitas()
    {
        return $this->belongsTo(Fasilitas::class, 'fas_id');
    }

    public function jenisLaporan()
    {
        return $this->belongsTo(JenisLaporan::class, 'jenis_lap_id');
    }

    public function jenisLimbah()
    {
        return $this->belongsTo(JenisLimbah::class, 'jenis_limbah_id');
    }

    public function brbn()
    {
        return $this->hasMany(LapFormBrbn::class, 'lap_id');
    }

    public function kontaminasi()
    {
        return $this->hasMany(LapFormKontaminasi::class, 'lap_id');
    }

    public function zraTerbuka()
    {
        return $this->hasMany(LapFormZraTerbuka::class, 'lap_id');
    }

    public function zraTertutup()
    {
        return $this->hasMany(LapFormZraTertutup::class, 'lap_id');
    }
}
