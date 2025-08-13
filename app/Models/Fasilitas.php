<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;

    protected $table = 'fasilitas';
    protected $primaryKey = 'fas_id';
    public $timestamps = false;
    protected $fillable = ['nama'];

    public function laporan()
    {
        return $this->hasMany(Laporan::class, 'fas_id');
    }
}
