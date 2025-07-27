<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    protected $table = 'gejalas';

    protected $fillable = [
        'kode',
        'nama',
        'jenis',
    ];

    public $timestamps = false;

    // Relasi ke Diagnosa (many-to-many)
    public function diagnosas()
    {
        return $this->belongsToMany(Diagnosa::class, 'diagnosa_gejalas');
    }

    // Relasi ke Bobot
    public function bobotGejalas()
    {
        return $this->hasMany(BobotGejala::class);
    }
}
