<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DafAkses extends Model
{
    use HasFactory;

    protected $table = 'daf_akses';
    protected $primaryKey = 'akses_id';
    public $timestamps = false;
    protected $fillable = ['nama', 'jenis_akses'];

    public function userAkses()
    {
        return $this->hasMany(UserAkses::class, 'akses_id');
    }
}
