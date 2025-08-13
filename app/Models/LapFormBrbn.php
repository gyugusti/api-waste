<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LapFormBrbn extends Model
{
    use HasFactory;

    protected $table = 'lap_form_brbn';
    protected $primaryKey = 'data_id';
    public $timestamps = false;
    protected $fillable = [
        'lap_id', 'bn_id', 'tgl', 'berat', 'burn_up', 'lokasi_penyimpanan', 'ket'
    ];

    public function laporan()
    {
        return $this->belongsTo(Laporan::class, 'lap_id');
    }

    public function bahanNuklir()
    {
        return $this->belongsTo(MasterBahanNuklir::class, 'bn_id');
    }
}
