<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAkses extends Model
{
    use HasFactory;

    protected $table = 'user_akses';
    protected $primaryKey = 'user_akses_id';
    public $timestamps = false;
    protected $fillable = ['user_id', 'akses_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function akses()
    {
        return $this->belongsTo(DafAkses::class, 'akses_id');
    }
}
