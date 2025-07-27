<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diagnosa extends Model
{
    protected $fillable = [
        'nama_pasien',
        'usia',
        'jenis_kelamin',
        'hasil_penyakit',
        'persentase',
    ];


    public function gejalas()
    {
        return $this->belongsToMany(Gejala::class, 'diagnosa_gejalas');
    }
}
