<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DafWadah extends Model
{
    use HasFactory;

    protected $table = 'daf_wadah';
    protected $primaryKey = 'wadah_id';
    public $timestamps = false;
    protected $fillable = ['nama'];
}
