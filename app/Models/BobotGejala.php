<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BobotGejala extends Model
{
    protected $table = 'bobot_gejalas';

    protected $fillable = [
        'penyakit_id',
        'gejala_id',
        'bobot',
    ];

    public $timestamps = false;

    // Relasi ke Gejala
    public function gejala()
    {
        return $this->belongsTo(Gejala::class);
    }

    // Relasi ke Penyakit
    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class);
    }
}
