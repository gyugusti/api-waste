<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisLimbah extends Model
{
    use HasFactory;

    protected $table = 'jenis_limbah';
    protected $primaryKey = 'jenis_limbah_id';
    public $timestamps = false;
    protected $fillable = ['nama', 'uraian'];

    public function laporan()
    {
        return $this->hasMany(Laporan::class, 'jenis_limbah_id');
    }
}
