<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterBahanNuklir extends Model
{
    use HasFactory;

    protected $table = 'master_bahan_nuklir';
    protected $primaryKey = 'bn_id';
    public $timestamps = false;
    protected $fillable = ['batch_id', 'tag_id'];

    public function brbn()
    {
        return $this->hasMany(LapFormBrbn::class, 'bn_id');
    }
}
