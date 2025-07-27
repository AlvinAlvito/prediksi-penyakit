<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiagnosaGejala extends Model
{
    protected $table = 'diagnosa_gejalas'; // nama tabel pivot

    protected $fillable = [
        'diagnosa_id',
        'gejala_id',
    ];

    public $timestamps = false; // karena tabel pivot biasanya tidak pakai timestamps
}
