<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DafSifat extends Model
{
    use HasFactory;

    protected $table = 'daf_sifat';
    protected $primaryKey = 'sifat_id';
    public $timestamps = false;
    protected $fillable = ['nama'];
}
