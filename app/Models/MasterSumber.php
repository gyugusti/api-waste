<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterSumber extends Model
{
    use HasFactory;

    protected $table = 'master_sumber';
    protected $primaryKey = 'master_sumber_id';
    public $timestamps = false;
    protected $fillable = [
        'nama', 'tipe', 'no_seri', 'jumlah', 'sat_jumlah_id', 'sifat_id'
    ];

    public function satuan()
    {
        return $this->belongsTo(DafSatuan::class, 'sat_jumlah_id');
    }

    public function sifat()
    {
        return $this->belongsTo(DafSifat::class, 'sifat_id');
    }

    public function zraTerbuka()
    {
        return $this->hasMany(LapFormZraTerbuka::class, 'master_sumber_id');
    }

    public function zraTertutup()
    {
        return $this->hasMany(LapFormZraTertutup::class, 'master_sumber_id');
    }
}
