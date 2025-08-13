<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LapFormKontaminasi extends Model
{
    use HasFactory;

    protected $table = 'lap_form_kontaminasi';
    protected $primaryKey = 'data_id';
    public $timestamps = false;
    protected $fillable = [
        'lap_id', 'nama_barang', 'berat', 'sat_berat_id', 'sifat_id', 'wadah_id'
    ];

    public function laporan()
    {
        return $this->belongsTo(Laporan::class, 'lap_id');
    }

    public function satuan()
    {
        return $this->belongsTo(DafSatuan::class, 'sat_berat_id');
    }

    public function sifat()
    {
        return $this->belongsTo(DafSifat::class, 'sifat_id');
    }

    public function wadah()
    {
        return $this->belongsTo(DafWadah::class, 'wadah_id');
    }
}
