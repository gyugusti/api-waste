<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisLaporan extends Model
{
    use HasFactory;

    protected $table = 'jenis_laporan';
    protected $primaryKey = 'jenis_lap_id';
    public $timestamps = false;
    protected $fillable = ['nama', 'jenis_tindakan'];

    public function laporan()
    {
        return $this->hasMany(Laporan::class, 'jenis_lap_id');
    }
}
