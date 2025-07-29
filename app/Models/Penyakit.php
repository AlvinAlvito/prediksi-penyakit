<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    protected $fillable = [
        'nama', 'deskripsi', 'pertolongan_pertama', 'saran_lanjut'
    ];
}
