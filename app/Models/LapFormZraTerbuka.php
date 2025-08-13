<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LapFormZraTerbuka extends Model
{
    use HasFactory;

    protected $table = 'lap_form_zra_terbuka';
    protected $primaryKey = 'data_id';
    public $timestamps = false;
    protected $fillable = [
        'lap_id', 'master_sumber_id', 'tipe', 'no_seri',
        'jumlah', 'satuan_id', 'sifat_id', 'kat_sumber_id'
    ];

    public function laporan()
    {
        return $this->belongsTo(Laporan::class, 'lap_id');
    }

    public function masterSumber()
    {
        return $this->belongsTo(MasterSumber::class, 'master_sumber_id');
    }

    public function satuan()
    {
        return $this->belongsTo(DafSatuan::class, 'satuan_id');
    }

    public function sifat()
    {
        return $this->belongsTo(DafSifat::class, 'sifat_id');
    }

    public function kategori()
    {
        return $this->belongsTo(KatSumber::class, 'kat_sumber_id');
    }
}
