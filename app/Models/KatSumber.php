<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KatSumber extends Model
{
    use HasFactory;

    protected $table = 'kat_sumber';
    protected $primaryKey = 'kat_sumber_id';
    public $timestamps = false;
    protected $fillable = ['nama'];

    public function zraTerbuka()
    {
        return $this->hasMany(LapFormZraTerbuka::class, 'kat_sumber_id');
    }

    public function zraTertutup()
    {
        return $this->hasMany(LapFormZraTertutup::class, 'kat_sumber_id');
    }
}
