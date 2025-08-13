<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DafSatuan extends Model
{
    use HasFactory;

    protected $table = 'daf_satuan';
    protected $primaryKey = 'satuan_id';
    public $timestamps = false;
    protected $fillable = ['nama'];

    public function kontaminasi()
    {
        return $this->hasMany(LapFormKontaminasi::class, 'sat_berat_id');
    }
}
